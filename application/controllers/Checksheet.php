<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;
class Checksheet extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('Checksheet_model');

		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('include/top_header');
		$this->load->view('checksheet/list');
		$this->load->view('include/footer');
	}

	public function create() {

		$this->load->view('include/header');
		$this->load->view('include/sidebar');
		$this->load->view('include/top_header');
		$this->load->view('checksheet/add');
		$this->load->view('include/footer');
	}

	public function create_new() {

		$formAction = $this->input->post('form_action');
		if ($formAction === 'preview') {

			$formData = $this->input->post();
			$preview_upload_path = 'assets/uploads/preview/';
			if (!is_dir($preview_upload_path)) {
				mkdir($preview_upload_path, 0755, true);
			}
			if (!empty($_FILES['title_logo']['name'])) {

				$tmp = $_FILES['title_logo']['tmp_name'];
				$ext = strtolower(pathinfo($_FILES['title_logo']['name'], PATHINFO_EXTENSION));
				$titleLogoName = uniqid('prev_') . '.' . $ext;
				$path = $preview_upload_path . $titleLogoName;
			
				if (move_uploaded_file($tmp, $path)) {
					$formData['title_logo'] = $titleLogoName;
				}
			}
			$featureFiles = [];
			if (!empty($_FILES['feature_logo']['name'][0])) {

				$count = count($_FILES['feature_logo']['name']);
				for ($i = 0; $i < $count; $i++) {

					$tmp = $_FILES['feature_logo']['tmp_name'][$i];
					$ext = strtolower(pathinfo($_FILES['feature_logo']['name'][$i], PATHINFO_EXTENSION));
					$featureLogoName = uniqid('prev_') . '.' . $ext;
					$path = $preview_upload_path . $featureLogoName;

					if (move_uploaded_file($tmp, $path)) {
						$featureFiles[] = $featureLogoName;
					}
				}
				$formData['feature_logo'] = $featureFiles;
			}
			if (!empty($_FILES['armor_coding_img']['name'])) {

				$tmp = $_FILES['armor_coding_img']['tmp_name'];
				$ext = strtolower(pathinfo($_FILES['armor_coding_img']['name'], PATHINFO_EXTENSION));
				$armorLogoName = uniqid('prev_') . '.' . $ext;
				$path = $preview_upload_path . $armorLogoName;
			
				if (move_uploaded_file($tmp, $path)) {
					$formData['armor_logo'] = $armorLogoName;
				}
			}
			if (!empty($_FILES['company_logo']['name'])) {

				$tmp = $_FILES['company_logo']['tmp_name'];
				$ext = strtolower(pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION));
				$companyLogoName = uniqid('prev_') . '.' . $ext;
				$path = $preview_upload_path . $companyLogoName;
			
				if (move_uploaded_file($tmp, $path)) {
					$formData['company_logo'] = $companyLogoName;
				}
			}
    		$this->session->set_userdata('preview_data', $formData);
			redirect('preview');

		} elseif ($formAction === 'generate') {
			
			/************* Upload Product Logo ***************/
			if(!empty($_FILES['title_logo']['name'])){

				$title_img = $_FILES['title_logo'];
				$uploadDir = 'assets/uploads/logo/';
				$ext = pathinfo($title_img['name'], PATHINFO_EXTENSION);
				$cleanExt = strtolower($ext);
				$allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

				if (!in_array($cleanExt, $allowed)) {

					echo "Only image files are allowed.";
					exit;
				}
				$newFileName = uniqid('img_') . '.' . $cleanExt;
				$uploadPath = $uploadDir . $newFileName;

				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0755, true);
				}

				if (move_uploaded_file($title_img['tmp_name'], $uploadPath)) {

					$main_logo = $newFileName; /************ Use for main logo variable ****************/
				} else {
					echo "Failed to upload image.";
				}
			}
			
			/************** Multiple Feature Logo *************/
			if(!empty($_FILES['feature_logo']['name'][0])){

				$files = $_FILES;
				$count = count($_FILES['feature_logo']['name']);
				$uploadedFeatureFileName = [];
				$this->load->library('upload');
				for ($i = 0; $i < $count; $i++) {

					$_FILES['file']['name'] = $files['feature_logo']['name'][$i];
					$_FILES['file']['type'] = $files['feature_logo']['type'][$i];
					$_FILES['file']['tmp_name'] = $files['feature_logo']['tmp_name'][$i];
					$_FILES['file']['error'] = $files['feature_logo']['error'][$i];
					$_FILES['file']['size'] = $files['feature_logo']['size'][$i];

					$config['upload_path'] = './assets/uploads/feature_logo/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
					$config['max_size'] = 2048;

					$ext = pathinfo($files['feature_logo']['name'][$i], PATHINFO_EXTENSION);
					$cleanExt = strtolower($ext);
					$randomName = uniqid('img_') . '.' . $cleanExt;
					$config['file_name'] = $randomName;

					if (!is_dir($config['upload_path'])) {

						mkdir($config['upload_path'], 0755, true);
					}
					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {

						$featureUploadData = $this->upload->data();
						$uploadedFeatureFileName[] = $featureUploadData['file_name']; /******** multiple feature images *********/
					} else {
						echo $this->upload->display_errors();
					}
				}
			}
			/*********** Upload Armor Coding Imgaes **************/
			if(!empty($_FILES['armor_coding_img']['name'])){

				$armor_img = $_FILES['armor_coding_img'];
				$uploadDir = 'assets/uploads/armor_img/';
				$ext = strtolower(pathinfo($armor_img['name'], PATHINFO_EXTENSION));
				$allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

				if (!in_array($ext, $allowed)) {

					echo "Only image files are allowed.";
					exit;
				}
				$armorFileName = uniqid('img_') . '.' . $ext;
				$uploadPath = $uploadDir . $armorFileName;

				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0755, true);
				}

				if (move_uploaded_file($armor_img['tmp_name'], $uploadPath)) {

					$armor_logo = $armorFileName; /************ Use for armor logo variable ****************/
				} else {
					echo "Failed to upload image.";
				}
			}
			/************** Company logo upload ***************/
			if(!empty($_FILES['company_logo']['name'])){

				$company_img = $_FILES['company_logo'];
				$uploadDir = 'assets/uploads/company_img/';
				$ext = strtolower(pathinfo($company_img['name'], PATHINFO_EXTENSION));
				$allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

				if (!in_array($ext, $allowed)) {

					echo "Only image files are allowed.";
					exit;
				}
				$companyLogoName = uniqid('img_') . '.' . $ext;
				$uploadPath = $uploadDir . $companyLogoName;

				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0755, true);
				}

				if (move_uploaded_file($company_img['tmp_name'], $uploadPath)) {

					$company_logo = $companyLogoName; /************ Use for company logo variable ****************/
				} else {
					echo "Failed to upload image.";
				}
			}

			/************** Database insertion *************/
			$checksheetData = array(
				'product_title' => $_POST['pro_title'],
				'product_type' => $_POST['pro_type'],
				'armor_short' => $_POST['armor_short'],
				'armor_type' => $_POST['armor_type'],
				'cable_title' => $_POST['cable_title'],
				'conductor_type' => $_POST['conductor_type'],
				'voltage_rating' => $_POST['voltage_rating'],
				'temperature_rating' => $_POST['temp_rating'],
				'description' => $_POST['description'],
				'additional_description' => $_POST['additional_desc'],
				'solid_conductor' => $_POST['solid_conductor'],
				'isulation' => $_POST['insulation'],
				'armor' => $_POST['armor'],
				'armor_coding_sub' => $_POST['armor_coding_sub'],
				'disclaimer' => $_POST['disclaimer'],
				'responsibility_statement' => $_POST['responsibility_statement'],
				'company_address' => $_POST['company_address'],
				'contact' => $_POST['company_contact'],
				'copyright_info' => $_POST['copyright_info']
			);
			$table_name = "checksheet";
			/*********** Insert checksheet data *************/
			if($inserted_id = $this->Checksheet_model->insertWithLastInsertedId($table_name, $checksheetData)){ 
				
				$checksheet_id = $inserted_id; /*********** Last inserted checksheet id ***********/
				$conductor_size = $_POST['conductor_size'];
				$conductor_strand = $_POST['conductor_strand'];
				$conductor_color = $_POST['conductor_color'];
				$cable_wire_size = $_POST['cable_wire_size'];
				$cable_diameter = $_POST['cable_diameter'];
				$cable_weight = $_POST['cable_weight'];
				$all_success = true;
				$row_count = count($conductor_size);

				/************ Insert conductor and Cable data *************/
				for ($x = 0; $x < $row_count; $x++) {

					$conductor_cable_data = array(
						'fk_checksheet_id'        => $checksheet_id,
						'size'                    => $conductor_size[$x],
						'strands'                 => $conductor_strand[$x],
						'color'                   => $conductor_color[$x],
						'green_ground_wire_size'  => $cable_wire_size[$x],
						'diameter'                => $cable_diameter[$x],
						'weight'                  => $cable_weight[$x]
					);
					if(!$this->Checksheet_model->insert('conductor_cable_details', $conductor_cable_data)){

						$all_success = false;
        				break;
					}
				}
				if ($all_success) {

					/************* For Multiple Standard Title *************/
					$standardData = array(
						'fk_checksheet_id' => $checksheet_id,
						'standard_title' => json_encode($_POST['standard_title']),
						'sequemtial_footage' => $_POST['sequential_footage'],
						'footage_marker' => $_POST['footage_marker'],
						'chevron_direction' => $_POST['chevron_direction'],
						'cable_size' => $_POST['cable_size'],
					);
					if($this->Checksheet_model->insert('standard_details', $standardData)){
						
						$logoData = array(
							'fk_checksheet_id' => $checksheet_id,
							'title_logo' => $main_logo,
							'feature_logo' => json_encode($uploadedFeatureFileName),
							'armor_coding_logo' => $armor_logo,
							'company_logo' => $company_logo
						);
						if($this->Checksheet_model->insert('logo_details', $logoData)){

							$this->session->set_flashdata('success', "Checksheet all data inserted successfully.");
						} else {

							$this->session->set_flashdata('error', "Something went wrong with logo images data. Please try again!");
						}
						redirect('checksheet-list');
					} else {

						$this->session->set_flashdata('error', "Something went wrong with Standard/Armor coding system data.");
						redirect('checksheet-list');
					}
				} else {

					$this->session->set_flashdata('error', "Something went wrong with conductor/cable data.");
					redirect('checksheet-list');
				}
			} else {

				$this->session->set_flashdata('error', "Something went wrong. Please try again!");
				redirect('checksheet-list');
			}

		} else {
			
			$form_data = $this->input->post();
			$this->session->set_userdata('download_data', $form_data);
			redirect('download-sheet');
		}
	}

	public function preview_sheet() {
		
		$data = $this->session->userdata('preview_data'); 
		if (empty($data) || empty($data['pro_title']) || empty($data['pro_type']) || empty($data['armor_type']) || empty($data['armor_short'])) {

			$this->session->set_flashdata('error', "No preview data found.");
			redirect('create-checksheet');
		}
		$this->session->unset_userdata('preview_data');
		$this->load->view('checksheet/preview', $data);
	}

	public function download_sheet() {

		$data = $this->session->userdata('download_data');
		if (empty($data) || empty($data['pro_title']) || empty($data['pro_type']) || empty($data['armor_type']) || empty($data['armor_short'])) {

			$this->session->set_flashdata('error', "No download data found.");
			redirect('create-checksheet');
		}
		$this->session->unset_userdata('download_data');
		$html = $this->load->view('checksheet/pdf_checksheet', $data, true);

		$options = new Options();
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();

		$dompdf->stream("checksheet_download.pdf", array("Attachment" => 0)); // 1 = download, 0 = view in browser
		exit;
	}
}
