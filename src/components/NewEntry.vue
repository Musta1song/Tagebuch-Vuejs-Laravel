<template>
  <div class="mt-10">
  <h1 class="mt-5"> {{ this.warning }}
</h1>
  <div class="block ">
    <v-textarea label="Liebes Tagebuch..." letiant="solo-filled"  auto-grow v-model="entry.entry"></v-textarea>
    <v-btn @click="createEntry()">
      {{this.bttext}}
    </v-btn>
  </div>
  </div>
  
</template>
<style scoped>
.v-textarea {
  margin-right: 30%;
  margin-left: 30%;
  margin-top: 20px;

}

h1{
  margin-left: 30%;
  
}

.v-btn {
  margin-left: 70.5%;
  margin-top: 20px;

}

div {
  max-height: 500px;
}
</style>
     
<script>
import DataService from '@/DataService';
import moment from 'moment';

export default {
  name: 'NewEntry',
  
  data() {
    return {
      entry: {
        entry: "",
      },
      data: [],
      bttext: "Speichern",
      warning:"",
      entryExists: false,
      id: null
    };
  },
  methods: {
    createEntry() {
      let data = {
        entry: this.entry.entry,
        date: this.getTodaysDate()
        
      };
      if (this.entry.entry !== "" && this.entryExists===false) {

        DataService.create(data)
          .then(response => {
            this.entry.id = response.data.id;
            console.log(response.data);
            this.submitted = true;
            window.location.reload()
          })
          .catch(e => {
            console.log(e);
          });
      } else if (this.entry.text == "") {
        alert("Sie können keinen leeren Eintrag speichern..")
      }
      else if (this.entryExists===true){
        this.entryExists = false
        this.removeEntry(this.id)
      }
    },
    getTodaysDate() {
      const date = moment().format('YYYY-MM-DD');
      console.log(date)

      return date

    },
    removeEntry(id) {
      DataService.delete(id)
        .then(response => {
          this.diary.id = response.data.id;
          console.log(response.data);
          this.submitted = true;
        })
        .catch(e => {
          console.log(e);
        });
      setTimeout(this.createEntry, 500)
      },
    getData() {
      DataService.getAll()
        .then(response => {
          this.data = response.data;
          console.log(this.data)
          this.checkData();
        })
        .catch(e => {
          console.log(e);
        });
    },
    checkData() {
      let todaysDate = this.getTodaysDate();
      for (let i = 0; i < this.data.length; i++) {
        if (this.data[i].date == todaysDate) {
          this.bttext = "Aktualisieren"
          this.id = this.data[i].id
          this.entryExists= true
          this.warning = "Eintrag für den heutigen Tag existiert bereits! Der bestehende Eintrag wird überschrieben!"
        }
      }

    }

  },
  mounted() {
    this.getData();
  }
}


</script>
     
     <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
     