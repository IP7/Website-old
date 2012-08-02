<?php

/* Test for fatal errors while loading Propel classes.
 *
 */

require '../config.php';
Config::init();

new AdQuery();
new Ad();
new AlertQuery();
new Alert();
new CommentQuery();
new Comment();
new ContentQuery();
new Content();
new ContentTypeQuery();
new ContentType();
new CourseQuery();
new Course();
new CursusQuery();
new Cursus();
new EventQuery();
new Event();
new EventTypeQuery();
new EventType();
new ExamQuery();
new Exam();
new FileQuery();
new File();
new ForumMessageQuery();
new ForumMessage();
new ForumCategoryQuery();
new ForumCategory();
new ForumTopicQuery();
new ForumTopic();
new NewsQuery();
new News();
new NewsletterQuery();
new Newsletter();
new NewsletterPostQuery();
new NewsletterPost();
new NoteQuery();
new Note();
new ReportQuery();
new Report();
new ScheduleQuery();
new Schedule();
new ScheduledCourseQuery();
new ScheduledCourse();
new TagQuery();
new Tag();
new TransactionQuery();
new Transaction();
new UserQuery();
new User();


echo "Ok.";

?>
