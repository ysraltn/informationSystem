<?php
class Teacher extends Dbh
{
    protected function getAll()
    {
        $statement = $this->connect()->prepare('SELECT users.id, users.name, users.surname, classes.className FROM users LEFT JOIN classes ON users.id = classes.classTeacherId WHERE users.role=2;');

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $teachers = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $teachers;
    }

    protected function getTLessons($id)
    {
        $statement = $this->connect()->prepare('SELECT users.id, users.name, users.surname, lessons.lessonName FROM users LEFT JOIN lessons ON users.id = lessons.teacherUserId WHERE users.id = ? AND users.role=2;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $teachersLessons = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $teachersLessons;
    }

    protected function deleteTById($id){
        $statement = $this->connect()->prepare('DELETE FROM users WHERE users.id = ? AND users.role = 2;');
        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../teachers.php?error=statementfailed");
            exit();
        }
        $statement = $this->connect()->prepare('UPDATE classes SET classes.classTeacherId = NULL WHERE classes.classTeacherId = ?;');
        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../teachers.php?error=statementfailed");
            exit();
        }
        $statement = $this->connect()->prepare('UPDATE lessons SET lessons.teacherUserId = NULL WHERE lessons.teacherUserId = ?;');
        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../teachers.php?error=statementfailed");
            exit();
        }

    }
}
