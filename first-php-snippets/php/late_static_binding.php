<?php
error_reporting (E_ALL | E_STRICT);

/**
 * Library
 *
 * Base library.
 *
 * @author     Radu Maier <rudisoft@rudisoft.net>
 * @package    RudWEb
 * @subpackage RudLibrary
 *
 */
abstract class Library
{
    /**
     * Stores object instances.
     *
     * @var array
     */
    protected static $_msInstance = array();

    /**
     * Get object instance
     *
     * @return object
     */
    public static function GetInstance( $class_name )
    {
        /**
         * Check if requested instance is the base library.
         */
        if ( __CLASS__ == $class_name )
        {
            /**
             * Stop.
             */
            return FALSE;
        }

        /**
         * Check that instance is not already set.
         */
        if ( !isset( self::$_msInstance[$class_name] ) )
        {
            /**
             * Set object instance.
             */
            self::$_msInstance[$class_name] = new $class_name();

            if ( function_exists( '__' ) )
            {
                /**
                 * @var string
                 */
                $inst_msg = sprintf(
                __( '%s library: Loading.', 'RudWEb' ),
                $class_name
                );

                //XXX
                //Core::Log()->Write( $inst_msg, 'debug' );
            }

            /**
             * Load object configuration.
             */
            //XXX
            //self::$_msInstance[$class_name]->LoadConfig();
        }

        /**
         * Return object instance.
         */
        return self::$_msInstance[$class_name];
    }

    /**
     * Load configuration file for current library.
     *
     * @return bool
     */
    public function LoadConfig()
    {
        /**
         * @var string
         */
        $class_name = get_called_class_custom();

        /**
         * @var string
         */
        $config_name = 'lib.' . strtolower( str_replace( '_', '.', $class_name )) . '.cfg';

        /**
         * @var string
         */
        $path_app = Core::Config()->Get( 'path.app' );

        /**
         * @var string
         */
        $config_file =  $path_app . 'etc/' . $config_name . '.xml';

        if ( !is_readable( $config_file ) )
        {
            if ( function_exists( '__' ) )
            {
                /**
                 * @var string
                 */
                $config_msg = sprintf(
                __( '%s library: Skipping configuration file "%s" (not found).', 'RudWEb' ),
                $class_name,
                $config_name
                );

                Core::Log()->Write( $config_msg, 'debug' );
            }


            return FALSE;
        }

        if ( function_exists( '__' ) )
        {
            /**
             * @var string
             */
            $config_msg = sprintf(
            __( '%s library: Loading configuration file "%s".', 'RudWEb' ),
            $class_name,
            $config_name
            );

            Core::Log()->Write( $config_msg, 'debug' );
        }

        return Core::Config()->Set( $config_file );
    }

    /**
     * Avoid normal class loading.
     */
    final private function __construct()
    {

    }

    /**
     * Avoid class cloning.
     */
    final private function __clone()
    {

    }
    
    public function test()
    {
        return get_class( $this );
        
    }
    
}



class Error extends Library
{
    public static function GetInstance()
    {
        return parent::GetInstance( __CLASS__ );
    }
    
}


    

$error = Error::GetInstance();
?>
<pre>
<?php //var_dump( Error::__toString() ); ?>

<?php //var_dump( Error::GetInstance() ); ?>
<?php var_dump( $error->test() ); ?>
</pre>