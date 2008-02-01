/*
./queries.sql
06:28 2008-01-21
*/

/* total days */
SELECT COUNT(DISTINCT work_day) FROM ubwork;
/* total hours */
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(work_end, work_start)))) FROM ubwork;
/* hours specific day */
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(work_end, work_start)))) FROM ubwork WHERE work_day = '2008-01-31';
/* day of the week*/
SELECT WEEKDAY(work_day) FROM ubwork WHERE work_day = '2008-01-31' LIMIT 1;


