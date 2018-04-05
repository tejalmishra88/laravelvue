<template>


   
    <div class="modal fade" id="viewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Show Single Task</h4>
                </div>
                <div class="modal-body">
                    
                    <label for='name'>View Task</label>
                    <p id="name">{{ViewRec.name}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" >Close</button>
                    
                </div>
            </div>
        </div>
    </div>
    

</template>
<script>
export default 
{
    props: ['ViewRec'], 
    
}    
  

</script>
<style>

</style>




