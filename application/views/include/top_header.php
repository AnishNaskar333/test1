        <div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
								data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
								data-bs-toggle="dropdown">
								<img src="<?= base_url('assets/img/avatars/avatar.jpg'); ?>" class="avatar img-fluid rounded me-1"
									alt="Charles Hall" /> 
									<span class="text-dark">
										<?php if ($this->session->userdata('logged_in')) {

											echo $this->session->userdata('admin_name');
										}else {
											
											echo "User is not logged in.";
										}?>
									</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1"
										data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="<?= base_url('logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>