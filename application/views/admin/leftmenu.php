<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header text-center">ONLINE CHALLAN SYSTEM(OCS)</li>
			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '1') { ?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Configuration</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">

						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/user_insert_form"><i class="fa fa-circle-o"></i> Add User Info</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Buyer Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_insert_form"><i class="fa fa-circle-o"></i>Add Buyer</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_list"><i class="fa fa-circle-o"></i>Buyer List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Job No Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/jobno_insert_form"><i class="fa fa-circle-o"></i>Add Job No</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/jobno_list"><i class="fa fa-circle-o"></i>Job No List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Style Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/style_insert_form"><i class="fa fa-circle-o"></i>Add Style</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/style_list"><i class="fa fa-circle-o"></i>Style List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Order Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/order_insert_form"><i class="fa fa-circle-o"></i>Add Order</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/order_list"><i class="fa fa-circle-o"></i>Order List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Color Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/color_insert_form"><i class="fa fa-circle-o"></i>Add Color</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/color_wise_fabric_part_list"><i class="fa fa-circle-o"></i>Color Wise Part List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/color_list"><i class="fa fa-circle-o"></i>Color List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Size Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/size_insert_form"><i class="fa fa-circle-o"></i>Add Size</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/color_wise_fabric_part_list"><i class="fa fa-circle-o"></i>Color Wise Part List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/size_list"><i class="fa fa-circle-o"></i>Size List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>UOM Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Part</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_part_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Part</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_part_list"><i class="fa fa-circle-o"></i>Fabric Part List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Garments Part</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_part_insert_form"><i class="fa fa-circle-o"></i>Add Garments Part</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_part_list"><i class="fa fa-circle-o"></i>Garments Part List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Production Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/production_type_insert_form"><i class="fa fa-circle-o"></i>Add Production Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/production_type_list"><i class="fa fa-circle-o"></i>Production Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Challan Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/challan_type_insert_form"><i class="fa fa-circle-o"></i>Add Challan Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/challan_type_list"><i class="fa fa-circle-o"></i>Challan Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Supplier Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_type_insert_form"><i class="fa fa-circle-o"></i>Add Supplier Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_type_list"><i class="fa fa-circle-o"></i>Supplier Type List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Non PO Category</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/non_po_product_category_insert_form"><i class="fa fa-circle-o"></i> Add Category</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/non_po_product_category_list"><i class="fa fa-circle-o"></i>Category List</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Gate Pass</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Create Challan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/order_list_for_challan"><i class="fa fa-circle-o"></i>Create Challan (By PO)</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/non_po_challan_create_form"><i class="fa fa-circle-o"></i>Create Challan (By Non-PO)</a></li> -->
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Report</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="#">
										<i class="fa fa-id-card" aria-hidden="true"></i> <span>PO Wise</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_list_form"><i class="fa fa-circle-o"></i>Date Wise Challan List</a></li>
										<?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_status_form"><i class="fa fa-circle-o"></i>Date Wise Challan(S/R)</a></li><?php */ ?>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_sent_status_form"><i class="fa fa-circle-o"></i>Date Wise Sent</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_recv_status_form"><i class="fa fa-circle-o"></i>Date Wise Receive</a></li>
									</ul>
								</li>
								<!-- <li class="treeview">
									<a href="#">
										<i class="fa fa-id-card" aria-hidden="true"></i> <span>NON PO Wise</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_list_form"><i class="fa fa-circle-o"></i>Date Wise Challan List</a></li>
										<?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_status_form"><i class="fa fa-circle-o"></i>Date Wise Challan(S/R)</a></li><?php */ ?>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_sent_status_form"><i class="fa fa-circle-o"></i>Date Wise Sent</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_recv_status_form"><i class="fa fa-circle-o"></i>Date Wise Receive</a></li>
									</ul>
								</li> -->
							</ul>
						</li>

					</ul>
				</li>
			<?php } ?>



			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '2') { ?>


				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Buyer Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_insert_form"><i class="fa fa-circle-o"></i>Add Buyer</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_list"><i class="fa fa-circle-o"></i>Buyer List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Job No Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/jobno_insert_form"><i class="fa fa-circle-o"></i>Add Job No</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/jobno_list"><i class="fa fa-circle-o"></i>Job No List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Style Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/style_insert_form"><i class="fa fa-circle-o"></i>Add Style</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/style_list"><i class="fa fa-circle-o"></i>Style List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Order Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/order_insert_form"><i class="fa fa-circle-o"></i>Add Order</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/order_list"><i class="fa fa-circle-o"></i>Order List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Color Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/color_insert_form"><i class="fa fa-circle-o"></i>Add Color</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/color_wise_fabric_part_list"><i class="fa fa-circle-o"></i>Color Wise Part List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/color_list"><i class="fa fa-circle-o"></i>Color List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Size Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/size_insert_form"><i class="fa fa-circle-o"></i>Add Size</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/color_wise_fabric_part_list"><i class="fa fa-circle-o"></i>Color Wise Part List</a></li> -->
								<li><a href="<?php echo base_url(); ?>Dashboard/size_list"><i class="fa fa-circle-o"></i>Size List</a></li>
							</ul>
						</li>


						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Garments Part</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_part_insert_form"><i class="fa fa-circle-o"></i>Add Garments Part</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_part_list"><i class="fa fa-circle-o"></i>Garments Part List</a></li>
							</ul>
						</li>
						<!-- <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Non PO Category</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/non_po_product_category_insert_form"><i class="fa fa-circle-o"></i> Add Category</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/non_po_product_category_list"><i class="fa fa-circle-o"></i>Category List</a></li>
							</ul>
						</li> -->
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Gate Pass</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Create Challan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/order_list_for_challan"><i class="fa fa-circle-o"></i>Create Challan (By Order)</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>Dashboard/non_po_challan_create_form"><i class="fa fa-circle-o"></i>Create Challan (By Non-PO)</a></li> -->
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Report</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="#">
										<i class="fa fa-id-card" aria-hidden="true"></i> <span>PO Wise</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_list_form"><i class="fa fa-circle-o"></i>Date Wise Challan List</a></li>
										<?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_status_form"><i class="fa fa-circle-o"></i>Date Wise Challan(S/R)</a></li><?php */ ?>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_sent_status_form"><i class="fa fa-circle-o"></i>Date Wise Sent</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_recv_status_form"><i class="fa fa-circle-o"></i>Date Wise Receive</a></li>
									</ul>
								</li>
								<!-- <li class="treeview">
									<a href="#">
										<i class="fa fa-id-card" aria-hidden="true"></i> <span>NON PO Wise</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_list_form"><i class="fa fa-circle-o"></i>Date Wise Challan List</a></li>
										<?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_status_form"><i class="fa fa-circle-o"></i>Date Wise Challan(S/R)</a></li><?php */ ?>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_sent_status_form"><i class="fa fa-circle-o"></i>Date Wise Sent</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_recv_status_form"><i class="fa fa-circle-o"></i>Date Wise Receive</a></li>
									</ul>
								</li> -->
							</ul>
						</li>

					</ul>
				</li>
			<?php } ?>

			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '3') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Gate Pass</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Report</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="#">
										<i class="fa fa-id-card" aria-hidden="true"></i> <span>PO Wise</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_list_form"><i class="fa fa-circle-o"></i>Date Wise Challan List</a></li>
										<?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_status_form"><i class="fa fa-circle-o"></i>Date Wise Challan(S/R)</a></li><?php */ ?>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_sent_status_form"><i class="fa fa-circle-o"></i>Date Wise Sent</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_recv_status_form"><i class="fa fa-circle-o"></i>Date Wise Receive</a></li>
									</ul>
								</li>
								<!-- <li class="treeview">
									<a href="#">
										<i class="fa fa-id-card" aria-hidden="true"></i> <span>NON PO Wise</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_list_form"><i class="fa fa-circle-o"></i>Date Wise Challan List</a></li>
										<?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/date_wise_challan_status_form"><i class="fa fa-circle-o"></i>Date Wise Challan(S/R)</a></li><?php */ ?>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_sent_status_form"><i class="fa fa-circle-o"></i>Date Wise Sent</a></li>
										<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_non_po_challan_recv_status_form"><i class="fa fa-circle-o"></i>Date Wise Receive</a></li>
									</ul>
								</li> -->
							</ul>
						</li>

					</ul>
				</li>
			<?php } ?>
			<?php //endif;
			?>
		</ul>
	</section>
</aside>