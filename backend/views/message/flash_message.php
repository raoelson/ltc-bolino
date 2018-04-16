
<script type="text/javascript">
		var MESSAGE_SUCCESS = "<?php echo $this->session->flashdata ( 'success' )?>";
		var MESSAGE_ERROR = "<?php echo $this->session->flashdata ( 'error' )?>";
	</script>
<script>
    $('document').ready(function(){
        if(!MESSAGE_SUCCESS == "" ){
        	notification("titre",MESSAGE_SUCCESS,"success");
        }     
        if(!MESSAGE_ERROR == "" ){
        	notification("titre",MESSAGE_ERROR,"error");
        }        
    });
</script>