<?php
function income_reports(){

    if(isset($_POST["search"])) {
    $from=$this->input->post('from_date');
    $to=$this->input->post('to_date');
    $this->load->model("Home_model");
    $data['view_report']=$this->Home_model->income_report($from,$to);
    $data['cat_result']=$this->Home_model->add_cat();
    $pdfFilePath = "output_pdf_name.pdf";
    $this->load->library('m_pdf');
    $html = $this->load->view('income_reports',$data,true);
    $this->m_pdf->pdf->WriteHTML($html);
    $this->m_pdf->pdf->Output($pdfFilePath, "D");

  }

 }




?>









<!DOCTYPE html>
 <html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Income |Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   </head>
    <div class="wrapper" >
     <!-- Main content -->
     <section class="invoice">

        <!-- Table row -->
        <div class="row">
           <div class="col-xs-12 table-responsive">
              <table class="table-border" cellspacing="50">
                 <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Income Amount</th>
                    </tr>
                 </thead>
                 <tbody>
                        <?php
                   $total_sum=0;
                                  if($view_report->num_rows() > 0)
                         {
                              $i=1;
                               foreach($view_report->result() as $row)
                                {
                           ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                       <td><?php echo $row->date;?></td>
                        <td><?php echo $row->cat_name;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->inc_amount;?></td>
                    </tr>
                    <?php
                     $total_sum+=$row->inc_amount;
                             }

                          }
                          else
                           {

                           ?>

                                   <tr><td>Not Found</td></tr>

                           <?php
                          }
                           ?>
                 </tbody>
              </table>
              <div>

            <h4 style="color: green; padding-left: 500px;">Total : ₹<?php echo $total_sum ?> !</h4>
          </div>
           </div>
           <!-- /.col -->
        </div>

        <!-- /.row -->
     </section>
     <!-- /.content -->
     </div>
     <!-- ./wrapper -->
    </body>
   </html>
