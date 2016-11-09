	function load_department()
	{
		var organization = $('#organization').val();
		return $.ajax({
			url: '/partials/structure',
			method: "GET", 
			data: {id:id, organization:organization},
			success: function(data){
				$('#department').html(data);
				console.log('department loaded');
			}
		});
	}
	
	function load_section()
	{
		var department = $('#department').val();
		return $.ajax({
			url: '/partials/structure',
			method: "GET", 
			data: {id:id, department:department},
			success: function(data){
				$('#section').html(data);
				console.log('section loaded');
			}
		});
	}
	
	function load_address()
	{
		var section = $('#section').val();
		return $.ajax({
			url: '/partials/structure',
			method: "GET", 
			data: {id:id, section:section},
			success: function(data){
				$('#address').html(data);
				console.log('address loaded');
			}
		});
	}

	
	function edit_data(text, column_name)  
    {  
		var dfd = $.Deferred();
		
        $.ajax({  
            url:url,  
            method:"PUT",  
            data:{id:id, text:text, column_name:column_name, _token: token},  
			success: dfd.resolve  
        });
		
		return dfd.promise();
    } 

	
$(document).ready(function(){ 
	
	/* Profile */
	$('#first_name').blur(function(){   
        var first_name = $('#first_name').val();  
        edit_data(first_name, "first_name");  
    });
	
	/* UsbTokens */
	$('#classification_level').blur(function(){  
		var classification_level = $('#classification_level').text();
        edit_data(classification_level, "classification_level");   
    });
	
	$('#registration_no').blur(function(){  
		var registration_no = $('#registration_no').text();
		edit_data(registration_no, "registration_no");   
	});
	
	$('#registration_date').blur(function(){  
		var registration_date = $('#registration_date').val();
		edit_data(registration_date, "registration_date");   
	});
	
	$('#history').blur(function(){  
		var history = $('#history').text();
		edit_data(history, "history");   
	});
	
	$('#notes').blur(function(){  
		var notes = $('#notes').text();
		edit_data(notes, "notes");   
	});
	
	/* Computers */
	$('#ip').blur(function(){  
		var ip = $('#ip').text();
		edit_data(ip, "ip");   
	});
	
	$('#name').blur(function(){  
		var name = $('#name').text();
		edit_data(name, "name");   
	});
	
	$('#inv_no').blur(function(){  
		var inv_no = $('#inv_no').text();
		edit_data(inv_no, "inv_no");   
	});
	
	$('#holder').blur(function(){  
		var holder = $('#holder').text();
		edit_data(holder, "holder");   
	});
	
	$('#provenance').blur(function(){  
		var provenance = $('#provenance').text();
		edit_data(provenance, "provenance");   
	});
	
	$('#ai').blur(function(){  
		var ai = $('#ai').text();
		edit_data(ai, "ai");   
	});

	$('#room').blur(function(){  
		var room = $('#room').text();
		edit_data(room, "room");   
	});
	
	$('#os').blur(function(){  
		var os = $('#os').text();
		edit_data(os, "os");   
	});
	
	$('#cis').blur(function(){  
		var cis = $('#cis').text();
		edit_data(cis, "cis");   
	});
	
	$('#hdd_reg_no').blur(function(){  
		var hdd_reg_no = $('#hdd_reg_no').text();
		edit_data(hdd_reg_no, "hdd_reg_no");   
	});
	
	$('#hdd_reg_date').blur(function(){  
		var hdd_reg_date = $('#hdd_reg_date').val();
		edit_data(hdd_reg_date, "hdd_reg_date");   
	});
	
	$('#hdd_mark_and_model').blur(function(){  
		var hdd_mark_and_model = $('#hdd_mark_and_model').text();
		edit_data(hdd_mark_and_model, "hdd_mark_and_model");   
	});
	
	$('#hdd_sn').blur(function(){  
		var hdd_sn = $('#hdd_sn').text();
		edit_data(hdd_sn, "hdd_sn");   
	});
	
	$('#hdd_capacity').blur(function(){  
		var hdd_capacity = $('#hdd_capacity').text();
		edit_data(hdd_capacity, "hdd_capacity");   
	});
	
	$('#hdd_interface').blur(function(){  
		var hdd_interface = $('#hdd_interface').text();
		edit_data(hdd_interface, "hdd_interface");   
	});
	
	$('#optical_drive').blur(function(){  
		var optical_drive = $('#optical_drive').text();
		edit_data(optical_drive, "optical_drive");   
	});
	
	$('#processor_type').blur(function(){  
		var processor_type = $('#processor_type').text();
		edit_data(processor_type, "processor_type");   
	});
	
	$('#processor_frequency').blur(function(){  
		var processor_frequency = $('#processor_frequency').text();
		edit_data(processor_frequency, "processor_frequency");   
	});
	
	$('#motherboard').blur(function(){  
		var motherboard = $('#motherboard').text();
		edit_data(motherboard, "motherboard");   
	});
	
	$('#sn').blur(function(){  
		var sn = $('#sn').text();
		edit_data(sn, "sn");   
	});
	
	$('#ram_capacity').blur(function(){  
		var ram_capacity = $('#ram_capacity').text();
		edit_data(ram_capacity, "ram_capacity");   
	});
	
	$('#ram_type').blur(function(){  
		var ram_type = $('#ram_type').text();
		edit_data(ram_type, "ram_type");   
	});
	
	$('#mac').blur(function(){  
		var mac = $('#mac').text();
		edit_data(mac, "mac");   
	});
	
	$('#type').blur(function(){  
		var type = $('#type').text();
		edit_data(type, "type");   
	});
	
	$('#optical_drive_rights').blur(function(){  
		var optical_drive_rights = $('#optical_drive_rights').text();
		edit_data(optical_drive_rights, "optical_drive_rights");   
	});
	
	$('#soft_rights').blur(function(){  
		var soft_rights = $('#soft_rights').text();
		edit_data(soft_rights, "soft_rights");   
	});
	
	$('#privileged_accounts').blur(function(){  
		var privileged_accounts = $('#privileged_accounts').text();
		edit_data(privileged_accounts, "privileged_accounts");   
	});
	
	$('#usb_rights').blur(function(){  
		var usb_rights = $('#usb_rights').text();
		edit_data(usb_rights, "usb_rights");   
	});
	
	$('#history').blur(function(){  
		var history = $('#history').text();
		edit_data(history, "history");   
	});
	
	$('#notes').blur(function(){  
		var notes = $('#notes').text();
		edit_data(notes, "notes");   
	});
	
	/* Employees */
	$('#first_name').blur(function(){  
		var first_name = $('#first_name').text();
		edit_data(first_name, "first_name");   
	});
	
	$('#last_name').blur(function(){  
		var last_name = $('#last_name').text();
		edit_data(last_name, "last_name");   
	});
	
	$('#father_last_name').blur(function(){  
		var father_last_name = $('#father_last_name').text();
		edit_data(father_last_name, "father_last_name");   
	});
		
	$('#work_phone_no').blur(function(){  
		var work_phone_no = $('#work_phone_no').text();
		edit_data(work_phone_no, "work_phone_no");   
	});
	
	$('#personal_phone_no').blur(function(){  
		var personal_phone_no = $('#personal_phone_no').text();
		edit_data(personal_phone_no, "personal_phone_no");   
	});
	
	$('#notes').blur(function(){  
		var notes = $('#notes').text();
		edit_data(notes, "notes");   
	});

	
	/* Accounts */
	$('#authorization_number').blur(function(){  
		var authorization_number = $('#authorization_number').text();
		edit_data(authorization_number, "authorization_number");   
	});
	
	$('#authorization_date').blur(function(){  
		var authorization_date = $('#authorization_date').val();
		edit_data(authorization_date, "authorization_date");   
	});
	
	$('#notes').blur(function(){  
		var notes = $('#notes').text();
		edit_data(notes, "notes");   
	});
	
	/* Peripherals */
	$('#type').blur(function(){  
		var type = $('#type').text();
		edit_data(type, "type");   
	});
	
	$('#mark').blur(function(){  
		var mark = $('#mark').text();
		edit_data(mark, "mark");   
	});
	
	$('#model').blur(function(){  
		var model = $('#model').text();
		edit_data(model, "model");   
	});
	
	$('#sn').blur(function(){  
		var sn = $('#sn').text();
		edit_data(sn, "sn");   
	});
	
	$('#destination').blur(function(){  
		var destination = $('#destination').text();
		edit_data(destination, "destination");   
	});
	
	/* Networkprinter */
	/*$('#ip').blur(function(){  
		var ip = $('#ip').text();
		edit_data(ip, "ip");   
	});
	
	$('#name').blur(function(){  
		var name = $('#name').text();
		edit_data(name, "name");   
	});
	
	$('#cis').blur(function(){  
		var cis = $('#cis').text();
		edit_data(cis, "cis");   
	});
	
	$('#mark').blur(function(){  
		var mark = $('#mark').text();
		edit_data(mark, "mark");   
	});
	
	$('#model').blur(function(){  
		var model = $('#model').text();
		edit_data(model, "model");   
	});
	
	$('#inv_no').blur(function(){  
		var inv_no = $('#inv_no').text();
		edit_data(inv_no, "inv_no");   
	});
	
	$('#room').blur(function(){  
		var room = $('#room').text();
		edit_data(room, "room");   
	});
	
	$('#sn').blur(function(){  
		var sn = $('#sn').text();
		edit_data(sn, "sn");   
	});
	
	$('#mac').blur(function(){  
		var mac = $('#mac').text();
		edit_data(mac, "mac");   
	});
	
	$('#provenance').blur(function(){  
		var provenance = $('#provenance').text();
		edit_data(provenance, "provenance");   
	});
	
	$('#ai').blur(function(){  
		var ai = $('#ai').text();
		edit_data(ai, "ai");   
	});
	
	$('#history').blur(function(){  
		var history = $('#history').text();
		edit_data(history, "history");   
	});
	
	$('#notes').blur(function(){  
		var notes = $('#notes').text();
		edit_data(notes, "notes");   
	});*/
	
	/* ON CLICK */
	$('#remove_usbtoken').click(function(){  
		edit_data('', "employee_id");   
		$('#employee_id').html('');
	});
	
	$('#toggle_status').click(function(){  
		if($('#status').text() === "Enabled") {
			$.ajax({  
				url:url,  
				method:"PUT",  
				data:{id:id, text:'0', column_name:'status', _token: token}, 
					success:function(msg){  
						$('#status').html(msg['status']).css('color', 'red'); 
						$('#toggle_status').val("Enable account");
					}  
	 
			});
		} else {
			$.ajax({  
            url:url,  
            method:"PUT",  
            data:{id:id, text:'1', column_name:'status', _token: token}, 
				success:function(msg){  
					$('#status').html(msg['status']).css('color', 'black'); 
					$('#toggle_status').val("Disable account");
				}  
 
			});
		}
	});
	
	/* ON CHANGE */
	$( ".type" ).change(function() {
		var type = $(this).val();
		edit_data(type, "type"); 
	});
	
	$("#rank").change(function() {
		var rank = $(this).val();
		edit_data(rank, "rank");
	});
	
	$( "#position" ).change(function() {
		var position = $(this).val();
		edit_data(position, "position"); 
	});

		
	
}); 