# early-scripts

My first PHP and shell scripts (2006 - 2008) and my early PHP, GD and SQLite snippets (2006 - 2009). A historical
archive, kept read-only.

Old scripts: they ran on the systems of their time and are not maintained. The PHP code is the PHP of its time: not
safe to deploy today.

## History

One folder per project, each with its own history (joined in 2026 by a merge commit):

| Folder | What | Years | Commits |
|---|---|---|---|
| `first-scripts-2006-2008/` | my first scripts, one folder each: my first shell script, my first PHP script (browser detection), exchange rates read from a bank's page, IMDb and Google search boxes, an aquarium tanks database, ubwork (hours worked), small tests | 2006 - 2008 | 11 |
| `first-php-snippets/` | the snippets I kept in my notes: arrays, dates, uploads, GD word wrap and an ASCII table, loading-time tests, late static binding, UTF-8 studies, SQLite tests, pagination, a form prefill test | 2006 - 2009 | 2 |

## How it was built

There was no version control then: in 2026 I turned the archived folders into commits. The first scripts were archived
on 2006-11-28 (ubwork on 2008-02-01), so their commits take those dates; the snippets were copied in 2022 and take the
date of the newest file with a dated copy elsewhere (2009-01-22). The last commit of each part before the merge sets LF
line endings and indents with spaces.

Left out of this public copy: the saved pages of the bank's site that the exchange-rate script read, the rows of my
work-hours table and a page with another person's messenger name.

## Third-party code

Kept as found, credited to their authors: AnyWhereInDB (`php/anywhereindb.php`, by Nafis Ahmad; no licence named), a
bad-word filter (`php/badword.txt`, "free to use by anyone for any purpose"), a snippet in `php/temp.php` (originally by
ReDuX, DaniWeb), the UTF-8 functions of `php/utfstudy.php` (from the PHP manual's user notes) and a Stack Overflow answer
on pagination (`php/pagination.txt`, CC BY-SA).

## Licence

MIT (see `LICENSE`), added in 2026: the scripts named no licence. It covers my own code, not the third-party code above.

See also [ub-mytime](https://github.com/webservco-legacy/ub-mytime) (ub MyTime, which ubwork copies) and
[course-work](https://github.com/webservco-legacy/course-work) (my courses of 2006 and 2008).
