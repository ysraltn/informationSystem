<?php
class ExamController extends Exam{
    public function getAllExams(){
        $classes = $this -> getAll();
        return $classes;
    }
    
    public function deleteExamById($id){
        $this->deleteEById($id);
    }

    public function getExamById($id){
        $exam = $this->getEById($id);
        return $exam;
    }

    public function updateExamById($id, $score){
        $this->updateEById($id, $score);
    }

    public function getExamsByTeacherId($id){
        $exams = $this->getEByTId($id);
        return $exams;
    }  
    
    public function getExamsByStudentId($id){
        $exams = $this->getEBySId($id);
        return $exams;
    } 
}