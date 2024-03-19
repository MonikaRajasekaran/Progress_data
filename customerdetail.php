<?php
@include 'config.php';

if (isset($_POST['add_product'])) {
    // print_r($_POST);exit();
    $Cust_Id = mysqli_real_escape_string($conn, $_POST['CustomerID']);
    $username_input = mysqli_real_escape_string($conn, $_POST['User']);
    $email_input = mysqli_real_escape_string($conn, $_POST['Email']);
    $joined_input = mysqli_real_escape_string($conn, $_POST['Joined']);
    $status_input = mysqli_real_escape_string($conn, $_POST['Status']);
    $purchased_input = mysqli_real_escape_string($conn, $_POST['Purchased']);
    $customer_image = $_FILES['customer_image']['name'];
    $customer_image_tmp_name = $_FILES['customer_image']['tmp_name'];
    $customer_image_folder = 'images/' . $customer_image;
    if (empty($customer_image)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO customerdetail (CustomerID,User,Email,Joined,Image,Status,Purchased) VALUES ('$Cust_Id','$username_input','$email_input','$joined_input','$customer_image','$status_input',$purchased_input')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($customer_image_tmp_name, $customer_image_folder);
            $message[] = 'new customer added successfully';
        } else {
            $message[] = 'could not add the product';
        }
    }
};
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select_query = mysqli_query($conn, "SELECT * FROM customerdetail WHERE id=$id");
    $row = mysqli_fetch_assoc($select_query);
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM customerdetail WHERE id = $id");
    header('location:customereg.php');
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
    <!----Font Awesome Link---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <section data-section-id="1" data-share="" data-category="ta-tables" data-component-id="2f328778_08_awz" class="py-8">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 px-4 mb-8 lg:mb-0">
                    <div class="px-6 pb-6 pt-4 bg-white shadow rounded">
                        <div class="flex flex-wrap items-center mb-3">
                            <div>
                                <div class="flex items-center">
                                    <h3 class="mr-2 text-xl font-bold" data-config-id="header1">Projects In Progress</h3>
                                </div>
                            </div>
                        </div>




                        <table class="table-auto w-full">
                            <thead>
                                <tr class="text-xs text-gray-500 text-left">
                                    <th class="pl-6 pb-3 font-medium">Customer ID</th>
                                    <th class="pb-3 font-medium">User</th>
                                    <th class="pb-3 font-medium">Joined</th>
                                    <th class="pb-3 font-medium">Status</th>
                                    <th class="pb-3 font-medium">Purchased</th>
                                    <th class="pb-3 font-medium">Action</th>
                                </tr>
                            </thead>
                            <?php
                            $select = mysqli_query($conn, "SELECT * FROM customerdetail");
                            ?>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                    <tr class="text-xs bg-gray-50">
                                        <td class="py-5 px-6 font-medium"><?php echo $row['CustomerID']; ?></td>
                                        <td class="flex px-4 py-3">
                                            <img class="w-8 h-8 mr-4 object-cover rounded-md" src="images/<?php echo $row['Image']; ?>">
                                            <div>
                                                <p class="font-medium"><?php echo $row['User']; ?></p>
                                                <p class="text-gray-500"><?php echo $row['Email']; ?></p>
                                            </div>
                                        </td>
                                        <td class="font-medium"><?php echo $row['Joined']; ?></td>
                                        <td>
                                            <span class="inline-block py-1 px-2 text-white bg-green-500 rounded-full"><?php echo $row['Status']; ?></span>
                                        </td>
                                        <td>
                                            <span class="inline-block py-1 px-2 text-purple-500 bg-purple-50 rounded-full"><?php echo $row['Purchased']; ?></span>
                                        </td>
                                        <td>
                                            <a href="customereg.php?edit=<?php echo $row['id']; ?>" class="inline-block mr-2 mt-4"><i class="fas fa-edit w-10 h-10 text-green-500"></i></a>
                                            <a href="#" class="inline-block mr-2 mt-4"><i class="fas fa-check w-10 h-10 b-10 text-blue-500"></i></a>
                                            <a href="customereg.php?delete=<?php echo $row['id']; ?>" class="inline-block mr-2"><i class="fas fa-trash w-10 h-10 text-red-500"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="w-full lg:w-1/3 px-4">
                    <div class="relative px-6 pb-6 py-4 bg-white rounded">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold" data-config-id="header2">Workflow Activity</h3>
                            <p class="text-sm text-gray-500" data-config-id="desc02">Changes in current tasks</p>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-0 h-full ml-1 w-px px-px bg-gray-300"></div>
                            <div class="relative">
                                <div class="flex items-center mb-8">
                                    <span class="inline-block w-2 h-2 ml-px mr-4 rounded-full bg-green-500"></span>
                                    <div>
                                        <a class="mb-1 text-sm font-medium" href="#">Example of task change</a>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-clock w-2 h-2 mr-2 text-grey-500"></i>
                                            <p>1h ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center mb-8">
                                    <span class="inline-block w-2 h-2 ml-px mr-4 rounded-full bg-green-500"></span>
                                    <div>
                                        <a class="mb-1 text-sm font-medium" href="#">Example of task change</a>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-clock w-2 h-2 mr-2 text-grey-500"></i>
                                            <p>1h ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center mb-8">
                                    <span class="inline-block w-2 h-2 ml-px mr-4 rounded-full bg-red-500"></span>
                                    <div>
                                        <a class="mb-1 text-sm font-medium" href="#">Example of task change</a>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-clock w-2 h-2 mr-2 text-grey-500"></i>
                                            <p>1h ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center mb-8">
                                    <span class="inline-block w-2 h-2 ml-px mr-4 rounded-full bg-gray-500"></span>
                                    <div>
                                        <a class="mb-1 text-sm font-medium" href="#">Example of task change</a>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-clock w-2 h-2 mr-2 text-grey-500"></i>
                                            <p>1h ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center mb-8">
                                    <span class="inline-block w-2 h-2 ml-px mr-4 rounded-full bg-red-500"></span>
                                    <div>
                                        <a class="mb-1 text-sm font-medium" href="#">Example of task change</a>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-clock w-2 h-2 mr-2 text-grey-500"></i>
                                            <p>1h ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <span class="inline-block w-2 h-2 ml-px mr-4 rounded-full bg-green-500"></span>
                                    <div>
                                        <a class="mb-1 text-sm font-medium" href="#">Example of task change</a>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-clock w-2 h-2 mr-2 text-grey-500"></i>
                                            <p>1h ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div>
                <a href="files.php">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    File Preview
                </button>
                </a>
              </div>
            </div>
        </div>
    </section>
</body>

</html>