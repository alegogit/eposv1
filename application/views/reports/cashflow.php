<div id="page-content-wrapper">
<!-- Page Content -->
  <div class="container-fluid" style="font-size:90%;">
  
    <div class="btn-group" role="group" aria-label="..." style="margin-top:10px;">
      <a role="button" class="btn btn-default" href="<?=base_url()?>reports/sales">&nbsp;&nbsp;&nbsp;Sales&nbsp;&nbsp;&nbsp;</a>
      <a role="button" class="btn btn-default" href="<?=base_url()?>reports/inventory">Inventory</a>          
      <a role="button" class="btn btn-primary" href="<?=base_url()?>reports/cashflow">Cash Flow</a>         
    </div>    
                                                                            
    <hr style="margin-bottom:10px;margin-top:10px" />         
    
    <div class="row" style="padding-left: 15px">  
      <?php
        $attributes = array('class' => 'form-inline', 'id' => 'filter', 'role' => 'form');
        echo form_open('reports/cashflow',$attributes)
      ?>
        <div class="form-group" style="margin-bottom:0px">
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
            <input id="startdate" name="startdate" type="text" value="<?=$startdate?>" class="form-control datepicker" style="display:inline;padding-left:10px;padding-right:-20px" title="Start Date">
          </div>                                                                                                                                                              
        </div>
        <div class="form-group" style="margin-bottom:0px">
          <div class="input-group">       
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
            <input id="enddate" name="enddate" type="text" value="<?=$enddate?>" class="form-control datepicker" style="display:inline;padding-left:10px;padding-right:-20px" title="End Date">
          </div>
        </div>
        <div class="form-group" style="margin-bottom:0px">
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-cutlery"></span></div>
            <select id = "myRestaurant" name="rest_id" title="Restaurant Name" class="form-control" style="display:inline">
              <option value = "0">ALL Restaurants</option>
              <?php foreach($restaurants as $row){ ?>
              <option value = "<?=$row->REST_ID?>" <?= ($row->REST_ID==$rest_id)?'selected':''?> ><?=$row->NAME?></option>
              <?php } ?>
            </select>   
          </div>
        </div>
        <div class="form-group" style="margin-bottom:0px">
          <div class="input-group">
            <button type="submit" class="btn btn-success" style="display:inline">Filter</button>   
          </div>
        </div>
      <?=form_close()?>
	  </div>                
    
    <hr style="margin-bottom:10px;margin-top:10px" />
	   
    <div class="panel panel-default">
		    <div class="panel-heading">
          <b>cashflow Report</b>  
        </div>
	      <div class="panel-body table-responsive">   
	        <table id="report" class="table table-striped dt-right compact">
				<thead>
						  <tr class="tablehead text3D">
						    <!--<th>Restaurant</th>-->
						    <th class="no-sort">Device</th>
						    <th class="cin no-sort">Cash From Register</th>
						    <th class="cin no-sort">Cash From Order</th>
						    <th class="cin no-sort">Debit From Order</th>
						    <th class="cin no-sort">Credit From Order</th>
						    <th class="no-sort">Terminal Date</th>
						  </tr>
						</thead>
						<tbody>           
						  <?php 
                $i = 0;
                $total['CASH_FROM_REGISTER'] = 0;  
                $total['CASH_FROM_ORDER'] = 0;  
                $total['DEBIT_FROM_ORDER'] = 0;  
                $total['CREDIT_FROM_ORDER'] = 0;  
                foreach ($cashflow as $row){ 
              ?>
						  <tr class="<?=$this->cashflow->inv_status_class($row->STATUS)?>" data-index="<?=$i?>">
						    <!--<td><?=$row->REST_NAME?></td>-->
						    <td><?=$row->DEVICE_NAME?></td>
						    <td class="cin"><?=number_format($row->CASH_FROM_REGISTER, 0, '', '.')?></td>
						    <td class="cin"><?=number_format($row->CASH_FROM_ORDER, 0, '', '.')?></td>
						    <td class="cin"><?=number_format($row->DEBIT_FROM_ORDER, 0, '', '.')?></td>
						    <td class="cin"><?=number_format($row->CREDIT_FROM_ORDER, 0, '', '.')?></td>
						    <td><?=$row->TERMINAL_DATE?></td>
						  </tr>
						  <?php 
                $total['CASH_FROM_REGISTER'] = $total['CASH_FROM_REGISTER']+$row->CASH_FROM_REGISTER;  
                $total['CASH_FROM_ORDER'] = $total['CASH_FROM_ORDER']+$row->CASH_FROM_ORDER;  
                $total['DEBIT_FROM_ORDER'] = $total['DEBIT_FROM_ORDER']+$row->DEBIT_FROM_ORDER;  
                $total['CREDIT_FROM_ORDER'] = $total['CREDIT_FROM_ORDER']+$row->CREDIT_FROM_ORDER;  
                $i++; 
              } ?>
						  <tr class="tablefoot text3D">
						    <!--<th>Restaurant</th>-->
						    <th class="no-sort">Total</th>
						    <th class="cin no-sort"><?=number_format($total['CASH_FROM_REGISTER'], 0, '', '.')?></th>
						    <th class="cin no-sort"><?=number_format($total['CASH_FROM_ORDER'], 0, '', '.')?></th>
						    <th class="cin no-sort"><?=number_format($total['DEBIT_FROM_ORDER'], 0, '', '.')?></th>
						    <th class="cin no-sort"><?=number_format($total['CREDIT_FROM_ORDER'], 0, '', '.')?></th>
						    <th class="no-sort"></th>
						  </tr>
						</tbody>
					</table>      
			  </div>
			</div>
		</div>
		
  </div><!-- /.container-fluid -->
</div><!-- /#page-content-wrapper -->

<script>  
  //datepickers    
  $("#startdate").datepicker({format: 'dd M yyyy'});
  $("#enddate").datepicker({format: 'dd M yyyy'});
    
  //inititate datatable
  var table = $('#report').DataTable({
    columnDefs: [
      { targets: 'no-sort', orderable: false }
    ],    
    searching: true,
    ordering:  false,
    bLengthChange: true,
    pageLength: 25
  });

</script>