<?php
    class StudentController extends Student{
        public function getAllStudents(){
            $students = $this->getAll();
            return $students;
        }

        public function getStudentById($id){
            $student = $this->getSById($id);
            return $student;
        }

        public function getExamsById($id){
            $exams = $this->getEById($id);
            return $exams;
        }

        public function setExamById($id, $lessonId, $classId ,$score){
            $this->setEById($id, $lessonId, $classId ,$score);
        }

        public function deleteStudentById($id){
            $this->deleteSById($id);
        }

        public function getAllTeachers(){
            $teachers = $this->getAllT();
            return $teachers;
        }
    }