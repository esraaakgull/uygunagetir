<?php include("header.php"); 



if(isset($_SESSION["yonetici"])){



$id=$_GET["id"];



$kategori=mysqli_fetch_array(mysqli_query($baglanti,"SELECT * FROM kategori WHERE kategori_id=$id"));



?>

<div class="content-wrapper">

    <section class="content">

      <div class="row">

        <div class="col-lg-12">

            <div class="box box-success">

               

                <!-- /.box-header -->

                <!-- form start -->

                <form role="form" action="kategoriguncelleok.php?kategori_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

                  <div class="box-body">

                  



                    <div class="form-group">

                      <label for="exampleInputPassword1">Kategori Adı</label>

                      <input type="text" name="kategoriadi" class="form-control"  placeholder="Kategori Adı" value="<?php echo $kategori["kategori_adi"]; ?>">

                    </div>



                  <div class="form-group">

                    <button type="submit" class="btn btn-success">GÜNCELLE</button>

                  </div>

                </form>  



                  <table id="example1" class="table table-bordered table-striped">

                    <thead>

                    <tr>

                      <th width="3%">SN</th>

                      <th>Kategori Adı</th>

                      <th width="11%"></th>

                    </tr>

                    </thead>

                    <tbody>

                     <?php

                      $sira=0;

                      $sorgu  = @mysqli_query($baglanti,"SELECT * FROM kategori ORDER BY kategori_adi ASC");

                      while($kategoriler=mysqli_fetch_array($sorgu))

                      {

                        $sira++;

                        echo "<tr>";

                        echo "<td>".$sira."</td>";

                        echo "<td>".$kategoriler[1]."</td>";

                        echo "<td><a href='kategori-$kategoriler[kategori_id].html'><button type='button' class='btn btn-warning btn-xs'>Düzenle</button></a>&nbsp;&nbsp;<a href='kategorisil.php?kategori_id=".$kategoriler[0]."'><button type='button' class='btn btn-danger btn-xs'>Kaldır</button></a></td>";

                      }



                      ?>

                    </tbody>

                  </table>

                

             </div>

         </div>    

       

      </div>

    </section>

</div> 

<?php 

}

else

{

  header("location:giris.html");

}





include("footer.php"); 

?>