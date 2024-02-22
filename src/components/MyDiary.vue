<template>
  <div class="flex">
    <div class=" BtDiv">
      <v-btn @click="makeRemoveBtVisible()" class="DelBt mx-5 mt-10">
        Einträge löschen
      </v-btn>
    </div>
    <div class="text-center flex ml-10 mt-10 diaryDiv" v-for="entry in diary" :key="entry">
      <div>
        <v-btn class="EntryBtn">
          {{ entry.date }}
          <v-dialog v-model="dialog" activator="parent" width="auto">
            <v-card>
              <v-card-text>
                {{ entry.entry }} </v-card-text>
              <v-card-actions>
                <v-btn color="primary" block @click="dialog = false">Schließen</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-btn>
        <v-btn id="removeBt" class="ml-2" @click="removeEntry(entry.id)">
          <v-icon icon="mdi-minus-circle"></v-icon>
        </v-btn>
      </div>
    </div>
  </div>
</template>
   
<script>
import DataService from '@/DataService';
export default {
  name: 'MyDiary',

  data() {
    return {
      data: [],
      diary: [],
      dialog: false,

    };
  },
  methods: {
    getData() {
      DataService.getAll()
        .then(response => {
          this.data = response.data;
          this.diary = this.data
          console.log(this.data)
        })
        .catch(e => {
          console.log(e);
        });
    },
    makeRemoveBtVisible() {
      const removeBt = document.getElementById("removeBt")
      removeBt.style.visibility = "visible"

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
      setTimeout(this.reload, 500)
    },
    reload() {
      window.location.reload()

    }
  },
  mounted() {
    this.getData();
  }
}


</script>
   
   <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#removeBt {
  visibility: hidden;
}

.flex {
  display: flex;
}

.BtDiv {
  border-right: 2px solid gray;
  height: 100vh;
}

#removeBt {
  background-color: rgb(247, 119, 119);
}

.DelBt {
  background-color: lightcoral;
}

.v-btn {
  min-width: 0;
}

.EntryBtn {
  background-color: lightblue;
}</style>
   