<?php $this->load->view('head')?>

<body class="boxed">
    <div class="wrapper">
        <?php $this->load->view('menu')?>
        </div>
        <div class="jumbotron">
        </div>

        <div class="main-content ">
            <div class="section">
                <div class="container">
                    <h2 class="section-heading">Download</h2>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Deskripsi</th>
                                <th class="text-center" width="150"><span class="fa fa-download"></span> Download</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($listdownload):?>
                            <?php $i = 1;foreach ($listdownload as $row):?>
                            <tr>
                                <td class="text-center"><?php echo $i++;?></td>
                                <td><?php echo $row->deskripsi;?></td>
                                <td class="text-center"><a href="<?php echo site_url()?>uploads/public/<?php echo $row->file;?>" download=""><span class="fa fa-download"></span> Download</a></td>
                            </tr>
                            <?php endforeach?>
                        <?php endif?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

<?php $this->load->view('footer')?>