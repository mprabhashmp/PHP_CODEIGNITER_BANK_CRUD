

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank Data View</title>

    
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>

    body{
      margin-top:20px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      .testbox {
      
      display:block;
      justify-content: center;
      align-items: center;
      height: inherit;
    margin-left: 35px;
    margin-right:35px;

      }
      form {
      width: 80%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #cc7a00; 
      margin-top: 30px;
      }
      .banner {
      position: relative;
      height: 100px;
      background-image: url("\application\views\banner.jpg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }

      .item span {
      color: red;
      }

      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc7a00;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff9800;
      }

    </style>
  </head>
  <body >

  <div class="btn-block">
    <a href="<?php echo base_url();?>index.php/bank_control/create">  <button type="submit" >ADD NEW</button> </a>
        </div>
<div class="testbox">

  <table id="myTable" class="display" style="width:80%;">

    <thead>
        <tr>
            <th>Bank Name</th>
            <th>Branch</th>
            <th>Account No.</th>
            <th>Action</th>
        </tr>
        <tbody>
    <?php foreach ($item as $list) { ?>
        <tr>
            <td><?php echo $list->bank_name; ?></td>
            <td><?php echo $list->branch; ?></td>
            <td><?php echo $list->acc_no; ?></td>
            <td><a href="<?php echo base_url(); ?>index.php/bank_control/edit/<?php echo $list->id; ?>"> Edit </a> | <a href="<?php echo base_url(); ?>index.php/bank_control/delete/<?php echo $list->id; ?>">Delete</a></td>
        </tr>
    <?php } ?>

</tbody>
</table>

      
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
    
  </body>
</html>