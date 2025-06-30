<main class="content">
    <div class="container-fluid p-0">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('add-new-checksheet')?>" method="post" enctype="multipart/form-data" target="_blank">
            <div class="create_form">
                <div class="container mt-4">
                    <div class="d-flex justify-content-between align-items-center logo mb-2">
                        <div class="inputBox mb-3">
                            <input type="file" name="title_logo" placeholder="Aluminum alloy armor applied over the complete assembly"  />
                            <span>Upload Logo</span>
                        </div>
                    </div>
                    <div class="top">
                        <div class="content d-flex justify-content-between align-items-center">
                            <div class="inputBox mb-3">
                                <input type="text" name="pro_title" placeholder="Type MC Cable"  style="width: 100%" />
                                <span>Product Title:</span>
                            </div>
                            <div class="inputBox mb-3">
                                <input type="text" name="pro_type" placeholder="Solid"  style="width: 100%" />
                                <span>Product Type:</span>
                            </div>
                        </div>
                        <div class="highlight d-flex justify-content-between align-items-center">
                            <div class="inputBox mb-3">
                                <input type="text" name="armor_short" placeholder="AL"  style="width: 120px" />
                                <span>Armor Short:</span>
                            </div>
                            <div class="inputBox mb-3">
                                <input type="text" name="armor_type" placeholder="Aluminum Armor" 
                                    style="width: 100%" />
                                <span>Armor Type:</span>
                            </div>
                        </div>
                    </div>
                    <div class="top_section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputBox mb-3">
                                    <input type="text" name="cable_title" placeholder="14 AWG –10 AWG THHN/THWN-2 Insulated Conductors with Green Insulated Ground"  />
                                    <span>Cable Title:</span>
                                </div>
                                <div class="inputBox mb-3">
                                    <input type="text" name="conductor_type" placeholder="Solid Conductors"  />
                                    <span>Conductors Type:</span>
                                </div>
                                <div class="inputBox mb-3">
                                    <input type="text" name="voltage_rating" placeholder="600V"  />
                                    <span>Voltage Rating:</span>
                                </div>
                                <div class="inputBox mb-3">
                                    <input type="text" name="temp_rating" placeholder="90°C Dry"  />
                                    <span>Temperature Rating:</span>
                                </div>
                                <div class="description">
                                    <h4 class="color_primary">Description:</h4>
                                    <div class="inputBox mb-3 mt-3">
                                        <textarea type="text" name="description" rows="5"
                                            placeholder="Metal-Clad Cable with two-, three- or four-circuit THHN/THWN conductors and a green insulated ground. Intended for use in accordance with the National Electrical Code®. Conductor constructions have the insulated conductors cabled together with a separator tape that displays the identification print legend wrapped around the assembly."
                                            ></textarea>
                                        <span>Description:</span>
                                    </div>
                                    <div class="inputBox mb-3">
                                        <input type="text" name="additional_desc" placeholder="An interlocked aluminum armor is applied over the entire + construction."
                                             />
                                        <span>Additional Description:</span>
                                    </div>
                                </div>
                                <div class="materials">
                                    <h4 class="color_primary">Materials:</h4>
                                    <div class="inputBox mb-3 mt-3">
                                        <input type="text" name="solid_conductor" placeholder="Soft, uncoated copper per ASTM B3"
                                             />
                                        <span>Solid Conductors:</span>
                                    </div>
                                    <div class="inputBox mb-3">
                                        <input type="text" name="insulation" placeholder="THHN/THWN-2 PVC (polyvinyl chloride) with color-coded nylon (polyamide) covering"  />
                                        <span>Insulation:</span>
                                    </div>
                                    <div class="inputBox mb-3">
                                        <input type="text" name="armor" placeholder="Aluminum alloy armor applied over the complete assembly"  />
                                        <span>Armor:</span>
                                    </div>
                                </div>
                                <div class="features">
                                    <h4 class="color_primary">Features:</h4>
                                    <div id="logo-container">
                                        <div class="inputBox mb-3 mt-3">
                                            <input type="file" name="feature_logo[]" />
                                            <span>Logo 1:</span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light mt-0" onclick="addLogo()">+</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="standards">
                                    <h4 class="text-white">Standards:</h4>
                                    <div id="standards-container">
                                        <div class="inputBox mb-3">
                                            <input type="text" name="standard_title[]" placeholder="UL 1569: E38918"  />
                                            <span>Standard 1:</span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light mt-0" onclick="addStandard()">
                                        +
                                    </button>
                                    <h4 class="mt-3 text-white">Armor Coding System*:</h4>
                                    <div class="armor-coding">
                                        <div class="step">
                                            <div class="number">1</div>
                                            <div class="inputBox mb-3">
                                                <input type="text" name="sequential_footage" placeholder="shown every two feet"
                                                     />
                                                <span>Sequential Footage:</span>
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="number">2</div>
                                            <div class="inputBox mb-3">
                                                <input type="text" name="footage_marker" placeholder="Black line = aluminum armor Chevron Colors: indicate number & color of conductors"  />
                                                <span>Footage Marker:</span>
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="number">3</div>
                                            <div class="inputBox mb-3">
                                                <input type="text" name="chevron_direction" placeholder="indicates recommended pull direction"  />
                                                <span>Chevron Direction:</span>
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="number">4</div>
                                            <div class="inputBox mb-3">
                                                <input type="text" name="cable_size" placeholder="indicates wire gauge & number of conductors" />
                                                <span>Cable Size:</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3">*PATENT PENDING</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="middle_image">
                        <div class="inputBox mb-3">
                            <input type="file" name="armor_coding_img" placeholder="Aluminum alloy armor applied over the complete assembly"  />
                            <span>Upload Armor Coding Image</span>
                        </div>
                        <div class="inputBox mb-3">
                            <input type="text" name="armor_coding_sub" placeholder="Aluminum alloy armor applied over the complete assembly"  />
                            <span>Armor Coding Sub:</span>
                        </div>
                    </div>
                    <div class="bottom_table">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th style="background-color: #a2a100; color: white;" colspan="3">Conductors
                                    </th>
                                    <th style="background-color: #a2a100; color: white;" colspan="3">Cable</th>
                                </tr>
                                <tr>
                                    <th style="background-color: #2d2a7c; color: white;">Size</th>
                                    <th style="background-color: #2d2a7c; color: white;"># of Strands</th>
                                    <th style="background-color: #2d2a7c; color: white;">Color</th>
                                    <th style="background-color: #2d2a7c; color: white;">Insulated Green Ground
                                        Wire Size</th>
                                    <th style="background-color: #2d2a7c; color: white;">Approx. Overall
                                        Diameter (in)</th>
                                    <th style="background-color: #2d2a7c; color: white;">Approx. Net Wt Lbs /
                                        1000</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr>
                                    <td><input type="text" name="conductor_size[]" class="form-control" placeholder="14/2"></td>
                                    <td><input type="text" name="conductor_strand[]" class="form-control" placeholder="Solid"></td>
                                    <td>
                                        <div class="d-flex justify-content-center" id="color-container-0">
                                            <input class="color-box" name="conductor_color[]" type="color" name="conductor_color" onchange="updateColor(this, 0)">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-light mt-1" onclick="addColor(0)">+</button>
                                    </td>
                                    <td><input type="text" name="cable_wire_size[]" class="form-control" placeholder="14AWG"></td>
                                    <td><input type="text" name="cable_diameter[]" class="form-control" placeholder="0.430"></td>
                                    <td><input type="text" name="cable_weight[]" class="form-control" placeholder="82.5"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-light mt-0" onclick="addRow()">+</button>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="container text-start">
                        <div class="footer_inner">
                            <div class="inputBox mb-3">
                                <input type="text" name="disclaimer" placeholder="Data are approximate and subject to normal manufacturing tolerances." ><span>Disclaimer:</span>
                            </div>
                            <div class="inputBox mb-3">
                                <input type="text" name="responsibility_statement" placeholder="It is the sole responsibility of the end user to determine suitability of this product for its intended use and application." ><span>Responsibility Statement:</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="inputBox">
                                    <input type="file" name="company_logo" placeholder="cerrowire" >
                                    <span>Company Logo:</span>
                                </div>
                                <div class="inputBox">
                                    <input type="text" name="company_contact" placeholder="800.523.3869" >
                                    <span>Contact:</span>
                                </div>
                                <div>
                                    <div class="inputBox mb-3">
                                        <input type="text" name="company_address" placeholder="A Marmon/Berkshire Hataway Company" ><span>Company Address:</span>
                                    </div>
                                    <div class="inputBox">
                                        <input type="text" name="copyright_info" placeholder="©2022 Cerrowire Rev 05/2024" >
                                        <span>Copyright Info:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="form_action" id="form_action" value="">
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <!-- <a href="javascript:void(0)" class="btn btn-success btn-block mx-1">Preview</a>
                    <input type="submit" class="btn btn-info btn-block mx-1" value="Generate">
                    <a href="#" class="btn btn-secondary btn-block mx-1">Download</a> -->
                    <a href="javascript:void(0)" class="btn btn-success btn-block mx-1" onclick="submitForm('preview')">Preview</a>
                    <input type="submit" class="btn btn-info btn-block mx-1" value="Generate" onclick="setFormAction('generate')">
                    <a href="javascript:void(0)" class="btn btn-secondary btn-block mx-1" onclick="submitForm('download')">Download</a>

                </div>
            </div>
        </form>
    </div>
</main>

<script>
	function setFormAction(action) {
		document.getElementById('form_action').value = action;
	}

	function submitForm(action) {
		setFormAction(action);
		document.querySelector('form').submit();
	}
</script>
<script>
		let standardCount = 1;
		function addStandard() {
			standardCount++;
			const container = document.getElementById('standards-container');
			const newInput = document.createElement('div');
			newInput.classList.add('inputBox', 'mb-3');
			newInput.innerHTML = `<input type="text" name="standard_title[]" placeholder="Standard ${standardCount}" required="" /> <span>Standard ${standardCount}:</span>`;
			container.appendChild(newInput);
		}

		let logoCount = 1;
		function addLogo() {
			logoCount++;
			const container = document.getElementById('logo-container');
			const newInput = document.createElement('div');
			newInput.classList.add('inputBox', 'mb-3', 'mt-3');
			newInput.innerHTML = `<input type="file" name="feature_logo[]" required="" /><span>Logo ${logoCount}:</span>`;
			container.appendChild(newInput);
		}

		let rowCount = 1;
		function addRow() {
			const tableBody = document.getElementById("table-body");
			const newRow = document.createElement("tr");
			const rowIndex = rowCount;
			newRow.innerHTML = `
					<td><input type="text" name="conductor_size[]" class="form-control" placeholder="14/2"></td>
					<td><input type="text" name="conductor_strand[]" class="form-control" placeholder="Solid"></td>
					<td>
						<div class="d-flex justify-content-center" id="color-container-${rowIndex}">
							<input class="color-box" name="conductor_color[]" type="color" onchange="updateColor(this, ${rowIndex})">
						</div>
						<button class="btn btn-sm btn-light mt-1" onclick="addColor(${rowIndex})">+</button>
					</td>
					<td><input type="text" name="cable_wire_size[]" class="form-control" placeholder="14AWG"></td>
					<td><input type="text" name="cable_diameter[]" class="form-control" placeholder="0.430"></td>
					<td><input type="text" name="cable_weight[]" class="form-control" placeholder="82.5"></td>
				`;
			tableBody.appendChild(newRow);
			rowCount++;
		}

		function addColor(rowIndex) {
			const colorContainer = document.getElementById(`color-container-${rowIndex}`);
			const newColorInput = document.createElement("input");
			newColorInput.type = "color";
			newColorInput.classList.add("color-box");
			newColorInput.onchange = function () { updateColor(this, rowIndex); };
			colorContainer.appendChild(newColorInput);
		}

	</script>