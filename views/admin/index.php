<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="language" content="English">
   <meta name="description" content="This is the admin page of PPU">
   <meta name="robots" content="follow">
   <meta name="author" content="Castro John Christian">
   <link rel="stylesheet" href="../css/admin/style.css">
   <title>PPU | Admin</title>
</head>

<body class="whole-container">
   <header class="container-header">

   </header>
   <main class="container-main main">
      <section class="main__nav">

      </section>
      <section class="main__container sub-sec">
         <section class="sub-sec__forms sub-form">
            <div class="sub-form__div form-container">
               <form class="form-container__content" action="../../controller/php/addStudentEntry.php" method="post" target="_self">
                  <!-- Student ID -->
                  <div>
                     <div>
                        <label for="studentId">Student ID:</label>
                     </div>
                     <div>
                        <input type="text" name="studentId" id="studentId" placeholder="Enter Student ID" required>
                     </div>
                  </div>

                  <!-- lastname -->
                  <div>
                     <div>
                        <label for="">Lastname:</label>
                     </div>
                     <div>
                        <input type="text" name="lname" id="lname" placeholder="Enter Lastname" required>
                     </div>
                  </div>

                  <!-- firstname -->
                  <div>
                     <div>
                        <label for="">First Name:</label>
                     </div>
                     <div>
                        <input type="text" name="fname" id="fname" placeholder="Enter Firstname" required>
                     </div>
                  </div>

                  <!-- Middle Init -->
                  <div>
                     <div>
                        <label for="">Middle Initial:</label>
                     </div>
                     <div>
                        <input type="text" name="middleInit" id="middleInit" placeholder="Enter Middle Initial">
                     </div>
                  </div>

                  <!-- Course -->
                  <div>
                     <div>
                        <label for="">Course:</label>
                     </div>
                     <div>
                        <input type="text" name="course" id="course" placeholder="Enter Course Ex: BSIT" required>
                     </div>
                  </div>

                  <!-- Major -->
                  <div>
                     <div>
                        <label for="">Major:</label>
                     </div>
                     <div>
                        <input type="text" name="major" id="major" placeholder="Enter Major">
                     </div>
                  </div>

                  <!-- Department -->
                  <div>
                     <div>
                        <div>
                           <label for="">Department:</label>
                        </div>
                        <div>
                           <select name="department" id="department">
                              <option value="">Select what department</option>
                              <option value="COT">College Of Technology</option>
                              <option value="COE">College Of Engineering</option>
                              <option value="CME">College Of Management & Entreprenuership</option>
                              <option value="CEAS">College Of Education, Arts & Sciences</option>
                           </select>
                        </div>
                     </div>
                  </div>

                  <!-- Device -->
                  <div>
                     <div>
                        <div>
                           <label for="">Device Used:</label>
                        </div>
                        <div>
                           <div>
                              <input type="radio" name="device" id="computer" value="Computer" required>
                              <label for="">Computer</label>
                           </div>

                           <div>
                              <input type="radio" name="device" id="printer" value="Computer" required>
                              <label for="">Printer</label>
                           </div>

                           <div>
                              <input type="radio" name="device" id="computerPrint" value="Computer & Printer" required>
                              <label for="">Computer & Printer</label>
                           </div>

                        </div>
                     </div>
                  </div>

                  <div>
                     <input type="submit" name="submit" id="submit" value="create">
                  </div>
               </form>
            </div>
         </section>
      </section>
   </main>
   <footer class="container-footer">
      <h6>Under Development @05/11/2024</h6>
   </footer>
</body>

</html>