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
      <section class="main__container sub-sec">
         <section class="sub-sec__header">
            <h3>Enter Entries</h3>
         </section>
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
                              <input type="radio" name="device" id="printer" value="Printer" required>
                              <label for="">Printer</label>
                           </div>

                           <div>
                              <input type="radio" name="device" id="computerPrint" value="Computer And Printer" required>
                              <label for="">Computer & Printer</label>
                           </div>

                        </div>
                     </div>
                  </div>

                  <div>
                     <input type="submit" name="submit" id="submit" value="Submit">
                  </div>
               </form>
            </div>
         </section>

         <nav class="sub-sec__nav">
            <div>
               <button>Add</button>
            </div>
            <div>
               <button>Refresh</button>
            </div>
            <div>
               <button>Edit</button>
            </div>
         </nav>
      </section>

      <section class="main_table_seciton table-sec">
         <?php
         $xml_student_entry = simplexml_load_file('../../model/xml/temp-select-entry.xml');
         ?>
         <div class="table-sec__container table">
            <table class="table__style">
               <thead>
                  <tr>
                     <th>ID No.</th>
                     <th>Student ID</th>
                     <th>Last Name</th>
                     <th>First Name</th>
                     <th>Middle Initial</th>
                     <th>Course</th>
                     <th>Major</th>
                     <th>Department</th>
                     <th>Device</th>
                     <th>Date & Time</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($xml_student_entry->entry as $entry) : ?>
                     <tr>
                        <td><?= $entry->student_id ?></td>
                        <td><?= $entry->stdcustomid ?></td>
                        <td><?= $entry->lastname ?></td>
                        <td><?= $entry->firstname ?></td>
                        <td><?= $entry->middlename ?></td>
                        <td><?= $entry->course ?></td>
                        <td><?= $entry->major ?></td>
                        <td><?= $entry->department ?></td>
                        <td><?= $entry->device ? $entry->device : "N/A" ?></td>
                        <td><?= $entry->datetime ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>

      </section>
   </main>
   <footer class="container-footer">
      <h6>Under Development @05/11/2024</h6>
   </footer>
</body>

</html>