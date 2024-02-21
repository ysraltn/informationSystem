<?php
    class TeacherController extends Teacher{
        public function getAllTeachers(){
            $teachers = $this->getAll();
            return $teachers;
        }
        public function getTeachersLessons($id){
            $teachersLessons = $this->getTLessons($id);
            return $teachersLessons;
        }
        public function deleteTeacherById($id){
            $this->deleteTById($id);
        }
    }