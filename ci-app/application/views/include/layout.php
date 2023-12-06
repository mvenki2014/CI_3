<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('include/header', $this->data); ?>
<body>
    <?php $this->load->view($pageName ?? 'index', $this->data); ?>
</body>
    <?php $this->load->view('include/footer', $this->data);?>
</html>
