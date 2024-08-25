<div id="form-vendor" class="col-xs-6 col-md-12">
    <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />

    <label for="Date" class="form-label required">Date</label>
    <input type="text" name="Date" class="form-control required-field">
    
    <label for="GoogleAdManagerID" class="form-label required">GoogleAdManagerID</label>
    <input type="text" name="GoogleAdManagerID" class="form-control required-field">

    <label for="Name" class="form-label required">Name</label>
    <input type="text" name="Name" class="form-control required-field">

    <label for="Email" class="form-label required">Email</label>
    <input type="text" name="Email" class="form-control required-field">

    <label for="Website" class="form-label required">Website</label>
    <input type="text" name="Website"  class="form-control required-field url-type">

</div>
<button id="submit-form-btn" type="Create" class="btn btn-primary" style="margin-top: 15px;">CREATE</button>  

<script>

    $(document).ready(function(){

        function validateForm(){ // here form labels required 
            let notValidMessages = [];
            $('#form-vendor > .required-field').each(function(i, e){
                if( $(e).val() === '' ){
                    notValidMessages.push( $(e).attr('name')+' is required!!!' );
                }
            });

            $('#form-vendor > .outline-warning').each(function(i, e){
                notValidMessages.push( $(e).attr('name')+' is not Valid!!!' );
            });
            
            return notValidMessages;
        }

        function submitForm(){ // here it appears the show cleon modal after submission event 
            let messages = validateForm();

            if( messages.length ){
                messages = '<p>'+messages.join('</p><p>')+'</p>';
                showCleonModal( 'Validation Error', messages );
                return;
            }


            let fields = $('#form-vendor > input, select');
            let postObj = getFieldValues(fields);
            

            $.ajax({
                url: `${admin_url}mcm/import_mcm_vendors`,
                type: 'POST',
                dataType: 'json', 
                data: postObj,
                success: function(result){
                console.log(result)
                }
            });


        }
        
        $('#submit-form-btn').on('click', function(){
            submitForm();
        });

    });
</script>