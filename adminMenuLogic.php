<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "itehdomaci";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }


    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['bookname']) && isset($_POST['writer']) && isset($_POST['genre']) && isset($_POST['edition'])) {
                if (!empty($_POST['bookname']) && !empty($_POST['writer']) && !empty($_POST['genre']) && !empty($_POST['edition'])) {

                    $bookname = $_POST['bookname'];
                    $writer = $_POST['writer'];
                    $genre = $_POST['genre'];
                    $edition = $_POST['edition'];

                    $query = "INSERT INTO books (book_name,writer,genre,edition) VALUES ('$bookname','$writer','$genre','$edition')";

                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('record added successfully');</script>";
                        echo "<script>window.location.href='adminMenu.php';</script>";
                    } else {
                        echo "<script>alert('failed');</script>";
                        echo "<script>window.location.href='adminMenu.php';</script>";
                    }
                } else {
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href='adminMenu.php';</script>";
                }
            }
        }
    }

    public function fetch()
    {
        $data = [];

        $query = "SELECT *
            FROM books
            LEFT JOIN users ON books.user_id=users.id;";

        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        shuffle($data);
        
        return $data;
    }


    public function delete($id)
    {
        $query = "DELETE FROM books
            WHERE book_id = '$id' ";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($id)
    {

        $data = null;

        $query = "SELECT* FROM books WHERE book_id='$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }


    public function edit($id)
    {

        $data = null;

        $query = "SELECT* FROM books WHERE book_id='$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {
        $query = " UPDATE books SET book_name='$data[book_name]', writer='$data[writer]', genre='$data[genre]', edition='$data[edition]'
             WHERE book_id='$data[book_id]'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update2($data)
    {
        $query = "UPDATE books SET user_id='$data[user_id]'
            WHERE book_id='$data[book_id]'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function sortBooksByTitle()
    {
        $data = null;

        $query = "SELECT * FROM books ORDER BY book_name";

        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function searchBooks($text)
    {
        $data = [];

        $query = "SELECT * FROM books WHERE book_name LIKE '%" . $text . "%'";

        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
