<?php
include "delete.php";
include "update.php";
include "create.php";

if (!isset($_SESSION)) {
  session_start();
}

$host = "localhost";
$user = "root";
$password = "root";
$db = "to_do_list";



$conn = new mysqli($host, $user, $password, $db);
$mysqli = $conn;

$sessionid = $_SESSION['id'];

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

  $sql = " SELECT * FROM todo WHERE user_id='$sessionid' ";
  $result = $mysqli->query($sql);
  $mysqli->close();



?>





  <!DOCTYPE html>
  <html>

  <head>
    <title>LOGIN</title>

    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



  </head>



  <body>


    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <div class="formPage">
      <div class="formContainer">


        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-top">
          <a class="navbar-brand" href="#">Hello <?php
                                                  echo $_SESSION['id'];
                                                  ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="#">To-Do's <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="#">Lists</a>
            </div>

          </div>
          <div class="topnav-right">
          <a href="logout.php">
          <i class="fa-solid fa-right-from-bracket fa-3x"></i>
          </a>
          </div>
        </nav>


        <div class="todoContainer">
          <div class="todoContainer-content">
            <div class="todoContainer-content-text-title">
              Add new To-Do
            </div>

            <div class="todoContainer-content-icons">
              <div class="todoContainer-content-icons-icon">
                <a data-target="#createModalId" data-toggle="modal" class="createModalId" id="acreateModalId" href="#createModalId">
                  <i class="fa-solid fa-circle-plus fa-4x"></i>
                </a>
              </div>
            </div>


          </div>


        </div>



        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) {
          $id = $rows['id'];
          $title = $rows['title'];
          $text = $rows['text'];
        ?>
          <div class="todoContainer">
            <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->


            <h1>

              <div id="dom-id" style="display: none;">
                <?php echo htmlspecialchars($id); ?>
              </div>

              <div id="dom-title">
                <?php echo htmlspecialchars($title); ?>
              </div>
            </h1>
            <div class="todoContainer-content">
              <div class="todoContainer-content-text">
                <div id="dom-text">
                  <p class="contentt"> 
                  <?php echo htmlspecialchars($text); ?>
                  </p>
                </div>

                <div class="regular-expressions">
                  <h5> Regular Expressions </h5>
                  <form>

                    <fieldset>

                      <p class="formbox">
                        <label for="find">Pattern</label>
                        <input type="text" id="find" />/g
                      </p>

                      <p class="formbox">
                        <label for="replace">Replacement Text</label>
                        <input type="text" id="replace" />
                      </p>

                      <p class="formbox">
                        <button id="btnSearch" class="btn btn-primary btn-lg disabled"> Do Search </button>
                        <button id="btnMatch" class="btn btn-primary btn-lg disabled"> Do Match </button>
                        <button id="btnReplace" class="btn btn-primary btn-lg disabled"> Do Replace </button>
                      </p>

                    </fieldset>

                  </form>
                  <p class="output"></p>

                </div>
              </div>

              <div class="todoContainer-content-icons">

                <div class="todoContainer-content-icons-icon">
                  <a href="delete.php?id=<?php echo $rows['id']; ?>">
                    <i class="fa-solid fa-trash fa-4x"></i>
                  </a>
                </div>

                <div class="todoContainer-content-icons-icon">

                  <a data-target="#editModal" data-toggle="modal" class="aModalEdit" id="aModalEditId" href="#editModalId">

                    <i class="fa-solid fa-pen fa-4x"></i>

                  </a>


                </div>

              </div>

            </div>

          </div>

        <?php
        }
        ?>








        <!-- ################################################################################################################################## -->

        <div class="modal" id="editModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <form action="update.php" method="POST">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">To-Do Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                  </button>
                </div>

                <div class="modal-body">

                  <label for="inputTitle">Title</label>
                  <input type="text" class="form-control" id="inputTitle" name="inputTitlephp" placeholder="title">

                  <label for="inputText">Text</label>
                  <textarea type="text" id="inputText" name="inputTextphp" rows="5" class="form-control"></textarea>

                  <input type="hidden" class="form-control" id="inputId" name="inputIdphp">


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="updatedata" class="btn btn-primary">Update data</button>
                </div>


            </div>
            </form>
          </div>

        </div>




        <div class="modal" id="createModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <form action="create.php" method="POST">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">To-Do Create</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                  </button>
                </div>

                <div class="modal-body">

                  <label for="inputTitle">Title</label>
                  <input type="text" class="form-control" id="inputTitlea" name="createInputTitle" placeholder="title">

                  <label for="inputText">Text</label>
                  <textarea type="text" id="inputText" name="createInputText" rows="5" class="form-control"></textarea>

                  <input type="hidden" class="form-control" id="inputId" name="inputIdphp">


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="createData" class="btn btn-primary">Create</button>
                </div>


            </div>
            </form>
          </div>

        </div>
        <!-- ################################################################################################################################## -->





        <!-- JQUERY OVDE-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/regularexpressions.js"></script>

  </body>

  </html>


<?php
} else {
  header("Location: home.php");
  exit();
}


?>