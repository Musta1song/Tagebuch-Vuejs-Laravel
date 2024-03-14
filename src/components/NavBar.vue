<template>
 <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
      <div class="navbar-nav">
     <router-link to="/" class="navbar-brand">Startseite</router-link>
        <a class="nav-link" href="/NeuerEintrag">Neuer Eintrag</a>
      </div>
    </div>
</nav>

</template>

<script>
export default {
  name: 'NavBar',
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.navbar{
  background-color: rgb(54, 167, 238);
}
a:hover{
color: aquamarine;
}
</style>
