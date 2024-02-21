<?php
class ClassController extends ClassE
{
    public function getAllClasses()
    {
        $classes = $this->getAll();
        return $classes;
    }

    public function getClassesStudents($id)
    {
        $students = $this->getCStudents($id);
        return $students;
    }

    public function getClassesByTeacherId($id)
    {
        $students = $this->getCByTId($id);
        return $students;
    }

    public function getClassesStudentsByTeacherId($id)
    {
        $students = $this->getCStudentsByTId($id);
        return $students;
    }

    public function addClass($className, $classTeacherId)
    {
        $this->addC($className, $classTeacherId);
    }

    public function addStudentToClass($studentId, $classId)
    {
        $this->addSToC($studentId, $classId);
    }

    public function deleteStudentFromClass($studentId, $classId)
    {
        $this->deleteSFromC($studentId, $classId);
    }
      
}
