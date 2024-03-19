<?php
@include 'config.php';

if (isset($_POST['add_product'])) {
    // print_r($_POST);exit();
    $username_input = mysqli_real_escape_string($conn, $_POST['User']);
    $userdomain_input = mysqli_real_escape_string($conn, $_POST['UserDomain']);
    $project_input = mysqli_real_escape_string($conn, $_POST['Project']);
    $projectsub_input = mysqli_real_escape_string($conn, $_POST['Project_Sub']);
    $progess_input = mysqli_real_escape_string($conn, $_POST['Progess']);
    $customer_image = $_FILES['customer_image']['name'];
    $customer_image_tmp_name = $_FILES['customer_image']['tmp_name'];
    $customer_image_folder = 'images/' . $customer_image;
    if (empty($customer_image)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO customerdetail (User,UserDomain,Project,Image,Project_Sub,Progess) VALUES ('$username_input','$userdomain_input','$project_input','$customer_image','$projectsub_input',$purchased_input')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($customer_image_tmp_name, $customer_image_folder);
            $message[] = 'new customer added successfully';
        } else {
            $message[] = 'could not add the product';
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progess Data</title>
  <!----Tailwind Cdn Link-->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
</head>
<body>
 <section class="py-8">
    <div class="container px-4 mx-auto">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full lg:w-2/3 px-4 mb-8 lg:mb-0">
          <div class="pt-4 bg-white shadow rounded">
            <div class="px-6 border-b border-blue-50">
              <div class="flex flex-wrap items-center mb-4">
                <div>
                  <h3 class="text-xl font-bold" data-config-id="header1">Project Progress Data</h3>
                  <p class="text-sm text-gray-500 font-medium" data-config-id="desc1">List of recent contracts and
                    freelancers</p>
                </div>
                <a class="ml-auto flex items-center py-2 px-3 text-xs text-white bg-indigo-500 hover:bg-indigo-600 rounded"
                  href="#">
                  <p>Report</p>
                </a>
              </div>
              <div><a class="inline-block px-4 pb-2 text-sm font-medium text-indigo-500 border-b-2 border-indigo-500"
                  href="customerdetail.php" data-config-id="tab1">Progress</a><a
                  class="inline-block px-4 pb-2 text-sm font-medium text-gray-300 border-b-2 border-transparent hover:border-gray-300"
                  href="#" data-config-id="tab2">Completed</a><a
                  class="inline-block px-4 pb-2 text-sm font-medium text-gray-300 border-b-2 border-transparent hover:border-gray-300"
                  href="#" data-config-id="tab3">Invoices</a>
              </div>
            </div>
            <div class="overflow-x-auto">
          
              <table class="table-auto w-full">
                <thead class="bg-gray-50">
                  <tr class="text-xs text-gray-500 text-left" data-config-id="row0">
                    <th class="flex items-center pl-6 py-4 font-medium">
                      <input class="mr-3" type="checkbox" name="" id="">
                      <span data-config-id="04_row0-1">Information</span>
                    </th>
                    <th class="py-4 font-medium" data-config-id="04_row0-2">Project Name</th>
                    <th class="py-4 font-medium" data-config-id="04_row0-3">Progress</th>
                  </tr>
                </thead>
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM customerdetail");
                    ?>
                <tbody>
                  <tr class="border-b border-blue-50">
                  <?php while ($row = mysqli_fetch_assoc($select)) { ?>

                    <td class="flex items-center py-4 px-6 font-medium">
                      <input class="mr-3" type="checkbox" name="" id="">
                      <div class="flex px-4 py-3">
                        <img class="w-8 h-8 mr-4 object-cover rounded-md"
                          src="images/userimage.jpg"
                          alt="" data-config-id="04_row1-11">
                        <div>
                          <p class="text-sm font-medium" data-config-id="04_row1-12"><?php echo $row['User']; ?></p>
                          <p class="text-xs text-gray-500" data-config-id="04_row1-13"><?php echo $row['UserDomain']; ?></p>
                        </div>
                      </div>
                    </td>
                    <td class="font-medium">
                      <p class="text-sm" data-config-id="04_row1-2"><?php echo $row['Project']; ?></p>
                      <p class="text-xs text-gray-500" ><?php echo $row['Project_Sub']; ?></p>
                    </td>
                    <td class="pr-6">
                      <p class="mb-1 text-xs text-indigo-500 font-medium"><?php echo $row['Progess']; ?></p>
                      <div class="flex">
                        <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                          <div class="absolute top-0 left-0 h-full w-4/6 bg-indigo-500 rounded-full"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/3 px-4">
          <div class="py-4 bg-white rounded">
            <div class="px-6 pb-6 border-b border-blue-50">
              <h3 class="text-xl font-bold" data-config-id="header2">Social Media Traffic</h3>
              <p class="text-sm text-gray-500" data-config-id="desc2">Visits from social media links</p>
            </div>
            <div class="p-6 border-b border-blue-50">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name1">Instagram</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">90%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-10/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-6 border-b border-blue-50">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name2">Twitter</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">82%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-9/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-6 border-b border-blue-50">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name3">Facebook</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">75%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-8/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-6 border-b border-blue-50">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name4">Linkedin</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">85%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-7/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-6 border-b border-blue-50">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name5">Tik Tok</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">50%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-6/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-6 border-b border-blue-50">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name6">Reddit</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">42%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-5/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-6">
              <div class="flex -mx-4">
                <div class="flex items-center w-1/2 px-4">
                  <p class="text-sm font-medium" data-config-id="name7">Product Hunt</p>
                </div>
                <div class="w-1/2 px-4">
                  <p class="mb-1 text-xs text-indigo-500 font-medium">25%</p>
                  <div class="flex">
                    <div class="relative h-1 w-48 bg-indigo-50 rounded-full">
                      <div class="absolute top-0 left-0 h-full w-3/12 bg-indigo-500 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>