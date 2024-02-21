<?php
    class LessonController extends Lesson{
        public function getAllLessons(){
            $lessons = $this->getAll();
            return $lessons;
        }

        public function addLesson($lessonName, $teacherId){
            $this->addL($lessonName, $teacherId);
        }

        public function getLessonById($id){
            $lesson = $this->getLById($id);
            return $lesson;
        }

        public function deleteLessonById($id){
            $this->deleteLById($id);
        }

        public function updateLessonById($id, $teacherId, $lessonName){
            $this->updateLById($id, $teacherId, $lessonName);
        }

        public function getLessonsByTeacherId($id){
            $lessons = $this->getLByTId($id);
            return $lessons;
        }
    }