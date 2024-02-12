<template>
 <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
      <div class="navbar-nav">
     <router-link to="/" class="navbar-brand">Liste</router-link>
        <a class="nav-link" href="/NeuerEintrag">Eintrag Erstellen</a>
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
  background-color: gold;
}
</style>
