$(document).ready(function() 
{
	/* Course Form Validation */
	$("#add_course,#update_course").validate({
	    rules: {
	        title: "required"
	    },
	    messages: {
	        title: "Please enter your course name"
	    }
	});

	/* Course Material Form Validation */
	$("#add_course_material,#update_course_material").validate({
	    rules: {
	        title: "required",
	        course_id: "required",
	        pdf_file: {
	        	required: true,
	        	// extension: "pdf"
	        },
	        doc_file: {
	        	required: true,
	        	// extension: "docx|doc"
	        },
	        zip_file: {
	        	required: true
	        }

	    },
	    messages: {
	        title: "Please enter your course name",
	        course_id: "Please select course",
	        pdf_file: {
	        	required: "Please select PDF file",
	        	// extension: "Please select valid format"
	        },
	        doc_file: {
	        	required: "Please select DOC file",
	        	// extension: "Please select valid format"
	        },
	        zip_file: {
	        	required: "Please select ZIP file",
	        	// extension: "Please select valid format"
	        }
	    }
	});

	/* User Form Validation */
	$("#add_user,#update_user").validate({
	    rules: {
	        first_name: "required",
	        last_name: "required",
	        age: "required",
	        gender: "required",
	        email: "required",
	        password: "required",
	        qualification: "required",
	        course_id: "required",
	        city: "required",
	        state: "required",
	        country: "required",

	    },
	    messages: {
	        first_name: "Please enter first name",
	        last_name: "Please enter last name",
	        age: "Please enter your age",
	        gender: "Please select gender",
	        email: "Please enter email",
	        password: "Please enter password",
	        qualification: "Please enter qualification",
	        course_id: "Please select course",
	        city: "Please enter city",
	        state: "Please enter state",
	        country: "Please enter country",
	    }
	});

});