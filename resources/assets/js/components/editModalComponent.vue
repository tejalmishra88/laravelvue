<template>
 
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @clear="clearModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Record</h4>
                </div>
                <div class="modal-body">
                    <p class="alert alert-success" v-if="success.length > 0">{{ success}}</p>
                    <label for='name'>Edit Record</label>
                    <textarea name="name" id="name" class="form-control" v-model="rec.name"></textarea>
                    <ul v-if="errors.name> 0" class="list-unstyled"></ul>
                    <li v-for="err of errors.name" class="alert alert-danger">{{err}}</li>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="clearModal" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="updateRecord">update changes</button>
                </div>
            </div>
        </div>
    </div>
    

</template>
<script>
export default 
{    props: ['rec'], 
     data()   {  return{   success:'', errors:[],  }   },
    methods:
    {     
        updateRecord()
            {   console.log('editcomp---updaterec--id=',this.rec.id);
            console.log('editcomp---updaterec--name=',this.rec.name);
                axios.post("http://127.0.0.1:8000/tasks/" + this.rec.id,
                 { 'name': this.rec.name,
                 '_method': 'PUT'    })
                .then(data =>{  console.log('editcomp---updaterec--name1=',this.rec.name);
                    this.$emit('recordUpdated', data);
                    this.success = "Task updated Successfully...";
                })
                .catch(error => this.errors = error.response.data.errors)
            },
                clearModal(){
                    this.errors=[];

                    this.success='';
                },
                    
                   
                   
                
            
        }
    }
    
        
    
     
    
  

</script>
<style>

</style>




