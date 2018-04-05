<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>All Todo Tasks
                        <span class="pull-right">
                          <a class="btn btn-success btn-XS" data-toggle='modal' href="#addModel">
                          +</a>
                        </span>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <input type="search" v-model="search" class="form-control" @keyup="searchRecord" placeholder="">
                      
                        <ul class="list-group">
                            <li class="list-group-item" v-for="t in tasks.data">{{ t.id}} - {{ t.name}}
                                 <span class="pull-right"><a data-toggle='modal' href="#editModal"class= "btn btn-primary btn-xs" @click="getRecord(t.id)">edit</a> 
                                 | <button @click="delrecord(t.id)" class="btn btn-danger btn-xs">delete</button> |
                                  <a class="btn btn-info btn-xs" data-toggle='modal' href="#viewModal" @click="getRecord(t.id)">preview</a></span></li>
                            </ul>
                            <pagination :data="tasks" v-on:pagination-change-page="getResults"></pagination>
                    </div>
                    <div class="panel-footer"><small class="text-right">Copyrights</small></div>
                </div>
            </div>
            <div id="modal"><addtask @recordadded="refreshRecord"></addtask>
            <edittask :rec="editRec" @recordUpdated="refreshRecord"></edittask>
            <viewtask :ViewRec="editRec"></viewtask>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./addModelComponent.vue'));
Vue.component('edittask', require('./editModalComponent.vue'));
Vue.component('viewtask', require('./viewModalComponent.vue'));

export default 
    {   data()
        {  return{  tasks:{},
                    record:{},
                    editRec:{},
                    errors:[],
                    search:'',

                 }
        },
       methods:
        {             
           //-------------------------------get resutls---
            getResults(page) 
            {	if (typeof page === 'undefined') {	page = 1;	}
			// Using vue-resource as an example
			   // axios.get('http://127.0.0.1:8000/tasks4?page=' + page)
                 axios.get('http://127.0.0.1:8000/tasks?page=' + page)
				.then(response => this.tasks = response.data)
                .catch(error => console.log(error))
                              
				
		    }, //----------get result finish----
            refreshRecord(record){this.tasks = record.data},
            //----------------get records start
            getRecord(id)
            {
                console.log('taskcompo---getrecord clicked id=',id);
                axios.get('http://127.0.0.1:8000/tasks/' +id+ '/edit')
                .then( response => { this.editRec = response.data 
                                    console.log('taskcomp---getrec----this.editrec=resp.data=',response);
                                     })
                .catch( error => this.errors = error.response.data.errors)
            },//getrecrod finish
            delrecord(id)
            {  const reply = confirm("Are You sure, you want to delete this record ?");
                if(reply)
                {     axios.post('http://127.0.0.1:8000/tasks' +id,{ id: id, _method: 'DELETE' })
                            .then( response => this.tasks = response.data) 
                            .catch( error => this.errors = error.response.data.errors)
                } else{ return}
            }, //delete finish
            searchRecord()
            { if(this.search.length >= 3)
                {  console.log('search fn trigger--this.search',this.search) //---its working till here
                    axios.get('http://127.0.0.1:8000/tasks/search/'+this.search) 
                    .then(response => { console.log(' response.data=', response)
                                        this.tasks = response.data
                                        }) 
                    .catch(err=> console.log('yehan to error hai',err))
                   } else{ this.getResults()            }
            }, //search finish
            updateRecord()
            {   axios.post("http://127.0.0.1:8000/tasks",
                 { 'name':this.record,    })
                .then(data =>{
                    this.$emit('recordadded', data);
                    this.success = "Task Added Successfully...";
                    this.record='';
                })
                .catch(error => this.errors = error.response.data.errors)
            }, //update record finish

          }, //method finish
       
       created() 
        {   axios.get('http://127.0.0.1:8000/tasks')
            .then((response)=>
                    { this.tasks= response.data;
                      console.log(' tejal response=',response);
                      console.log('aditi response.data=',response.data);
                      // console.log(' this.tasks=',this.tasks);
                    }
                )
            .catch((error)=>console.log(error));
            
        }  //created finsih


    }//export default
</script>
