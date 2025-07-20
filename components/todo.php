<script type="text/x-template" id="todo">
    <div>
            <p>Search: <input type="text" v-model="search"></p>
            <!-- <div>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th  @click="sortBy('id')">id</th>
                            <th  @click="sortBy('title')">title</th>
                            <th  @click="sortBy('description')">description</th>
                            <th  @click="sortBy('kategoria')">kategoria</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="elem in filtered">
                        <td>{{elem.id}}</td>
                            
                            <td>{{elem.title}}</td>
                            <td>{{elem.description}}</td>
                            <td>{{elem.kategoria}}</td>

                            <td>
                                <button type="button" class="btn btn-success editbtn" @click="edit(elem.id)"> EDIT </button>
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger deletebtn" @click="deletem(elem.id)"> DELETE </button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div> -->

            <div class="todo">
                <p v-for="elem in filtered" class="task-item"><input type="checkbox"  @change="dupa(elem)" v-model="elem.done">  {{elem.title}}   <button v-if="adminmode" type="button" class="btn-sm btn-danger deletebtn" @click="deletem(elem.id)"> x </button></p>
            </div>
            <div>    
                <br>
            <p style="margin-bottom:0.5rem"><b>Dodaj pozycję:</b></p>
            <label for="">Tytuł:</label>
            <input type="text" v-model="editedone.title" style="width:90%;max-width:400px">
            <br>
            <!-- <label for="">Opis</label>
            <input type="text" v-model="editedone.description">
            <br>
            <label for="">Kategoria</label>
            <input type="text" v-model="editedone.kategoria">
            <br>
            <label for="">Kolumna</label>
             -->
            <!-- <input type="number" v-model="editedone.kolumna" min="1" max="3"> -->
            <br>
            <button @click="add" v-if="!editedone.id" class="btn btn-primary applybutton">Zatwierdź</button>

            <button @click="update" v-if="editedone.id">Zmień</button>

            </div>

            <button style="position:absolute;left:10px;bottom:10px;height:15px" @click="adminmode = !adminmode"> &nbsp;</button>

</div>
</script>


<script>
    Vue.component('todo', {
        template: '#todo',
        data() {
            return {
                heads: [],
                cruddata: [],
                cruddataadd:{},
                editedone: {
                    title:'',
                    description:'',
                    kolumna:1
                },
                search: '',
                sortkey: '',
                adminmode:false
            }
        },
        created() {
            this.getData();
        },
        methods: {
            getData(){
                let self = this;
            axios.post('api/read.php', {
                tabela: 'linki'
            }).then((res) => {
                this.cruddata = res.data
            }).then((res) => self.getHeads());

            },
            edit(id) {
                this.editedone = this.cruddata.find((el) => el.id == id);
            },
            add(){
                let self = this;
                axios.post('api/add.php',{tabela:'linki',dane:this.editedone}).then((res)=>{self.editedone = {};self.getData()})
            },
            update() {
                axios.post('api/update.php', {
                    dane: this.editedone,
                    id: this.editedone.id
                }).then((res) => {
                    this.editedone = {}
                })

            },
            deletem(id) {
                axios.post('api/delete.php', {
                    tabela: 'linki',
                    id: id
                }).then((res) => console.log(res)).then((res) => location.reload());
            },
            getHeads() {
                if (this.cruddata[0]) {
                    this.heads = Object.keys(this.cruddata[0])
                }
            },
            sortBy(elem) {
                console.log('sortby');
                this.sortkey = elem;
            },
            dupa(elem){
                axios.post('api/update.php', {
                    dane: elem,
                    id: elem.id
                })
            }
        },
        computed: {
            filtered: function() {
                let self = this;
                var filterKey = this.search && this.search.toLowerCase()
                var order = 1;
                var filtered = this.cruddata;
                if (filterKey) {
                    filtered = filtered.filter(function(row) {
                        return Object.keys(row).some(function(key) {
                            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                        })
                    })
                }
                if (this.sortkey) {

                    filtered = filtered.sort(function(a, b) {
                        console.log(self.sortkey);

                        var keyA = a[self.sortkey];
                        var keyB = b[self.sortkey];
                        // Compare the 2 dates
                        if (keyA < keyB) return -1;
                        if (keyA > keyB) return 1;
                        return 0;
                    })
                }
                return filtered
            }
        }
    });
</script>