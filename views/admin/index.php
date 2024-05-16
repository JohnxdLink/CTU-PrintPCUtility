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
         <!-- Add Form Entries -->
         <section id="add_entries_content" class="sub-sec__forms sub-form">
            <div class="sub-form__header">
               <h3>Enter Entries</h3>
            </div>

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
      </section>

      <section class="main-table-seciton table-sec">
         <div class="table-sec__count-entries-container cnt-entry">
            <div class="table-sec__count-entries-container--flex-column">
               <div class="cnt-entry__container cnt-entry--other">
                  <div>
                     <img class="cnt-entry--dept-image-min-size" src="../public/images/icons/entry.png" alt="">
                  </div>
                  <div class="cnt_entry__texts">
                     <div>
                        <h3>00</h3>
                     </div>
                     <div>
                        <h5>Overall Entries</h5>
                     </div>
                  </div>
               </div>

               <div class="cnt-entry__container cnt-entry--other">
                  <div>
                     <img class="cnt-entry--dept-image-min-size" src="../public/images/icons/today.png" alt="">
                  </div>
                  <div class="cnt_entry__texts">
                     <div>
                        <h3>00</h3>
                     </div>
                     <div>
                        <h5>Entries Today</h5>
                     </div>
                  </div>
               </div>
            </div>


            <div class="cnt-entry__container dept-entry-con--color">
               <div>
                  <img class="cnt-entry--dept-image" src="../public/images/logo/CEAS Logo.png" alt="">
               </div>
               <div class="cnt_entry__texts">
                  <div>
                     <h1>00</h1>
                  </div>
                  <div>
                     <h4>CEAS</h4>
                  </div>
               </div>
            </div>

            <div class="cnt-entry__container dept-entry-con--color">
               <div>
                  <img class="cnt-entry--dept-image" src="../public/images/logo/CME Logo.png" alt="">
               </div>
               <div class="cnt_entry__texts">
                  <div>
                     <h1>00</h1>
                  </div>
                  <div>
                     <h4>CME</h4>
                  </div>
               </div>
            </div>

            <div class="cnt-entry__container dept-entry-con--color">
               <div>
                  <img class="cnt-entry--dept-image" src="../public/images/logo/COE Logo.png" alt="">
               </div>
               <div class="cnt_entry__texts">
                  <div>
                     <h1>00</h1>
                  </div>
                  <div>
                     <h4>COE</h4>
                  </div>
               </div>
            </div>

            <div class="cnt-entry__container dept-entry-con--color">
               <div>
                  <img class="cnt-entry--dept-image" src="../public/images/logo/COT Logo.png" alt="">
               </div>
               <div class="cnt_entry__texts">
                  <div>
                     <h1>00</h1>
                  </div>
                  <div>
                     <h4>COT</h4>
                  </div>
               </div>
            </div>
         </div>

         <div class="table-sec__update-delete-container update-delete">
            <?php
            $xml_selected_entry = simplexml_load_file('../../model/xml/temp-entry.xml');
            ?>
            <form class="update-delete__container upt-dlte-sec" action="../../controller/php/updateDeleteStudentEntry.php" method="post">
               <section class="upt-dlte-sec">
                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <input type="text" name="noid" id="noid" placeholder="Enter ID No." value="<?php echo (!empty($xml_selected_entry->entry->noid)) ? $xml_selected_entry->entry->noid : ""; ?>">
                     </div>
                     <div>
                        <input type="submit" name="search" id="search" value="Search">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/id.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="customid" id="customid" value="<?php echo (!empty($xml_selected_entry->entry->id)) ? $xml_selected_entry->entry->id : ""; ?>">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/user.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="lastname" id="lastname" value="<?php echo (!empty($xml_selected_entry->entry->lastname)) ? $xml_selected_entry->entry->lastname : ""; ?>">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/user.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="firstname" id="firstname" value="<?php echo (!empty($xml_selected_entry->entry->firstname)) ? $xml_selected_entry->entry->firstname : ""; ?>">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/user.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="middlename" id="middlename" value="<?php echo (!empty($xml_selected_entry->entry->middlename)) ? $xml_selected_entry->entry->middlename : ""; ?>">
                     </div>
                  </div>
               </section>

               <section class="upt-dlte-sec">
                  <div class="upt-dlte-sec--sub-form" style="margin-top: 27px;">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/course.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="course" id="course" value="<?php echo (!empty($xml_selected_entry->entry->course)) ? $xml_selected_entry->entry->course : ""; ?>">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/major.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="major" id="major" value="<?php echo (!empty($xml_selected_entry->entry->major)) ? $xml_selected_entry->entry->major : ""; ?>">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/department.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="department" id="department" value="<?php echo (!empty($xml_selected_entry->entry->department)) ? $xml_selected_entry->entry->department : ""; ?>">
                     </div>
                  </div>
               </section>

               <section class="upt-dlte-sec">
                  <div class="upt-dlte-sec--sub-form" style="margin-top: 27px;">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/device.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="device" id="device" value="<?php echo (!empty($xml_selected_entry->entry->device)) ? $xml_selected_entry->entry->device : ""; ?>">
                     </div>
                  </div>

                  <div class="upt-dlte-sec--sub-form">
                     <div>
                        <img class="form__image--modify" src="../public/images/icons/datetime.png" alt="">
                     </div>
                     <div>
                        <input type="text" name="datetime" id="datetime" value="<?php echo (!empty($xml_selected_entry->entry->datetime)) ? $xml_selected_entry->entry->datetime : ""; ?>">
                     </div>
                  </div>
               </section>

               <section class="upt-dlte-sec">
                  <div style="margin-top: 27px;">
                     <div>
                        <input type="submit" name="update" id="update" value="Update">
                     </div>
                     <div>
                        <input type="submit" name="delete" id="delete" value="Delete">
                     </div>
                  </div>
               </section>
            </form>
         </div>
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

   <script src="../js/admin/script.js"></script>
</body>

</html>