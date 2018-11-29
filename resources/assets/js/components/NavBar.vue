<template id="">
  <nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
      <li class="pure-item-menu"><router-link :to="{name: 'home'}" class="pure-menu-link text-uppercase">Inicio</router-link></li>
      <li class="pure-item-menu"><router-link :to="{name: 'about'}" class="pure-menu-link text-uppercase">Nosotros</router-link></li>
      <li class="pure-item-menu"><router-link :to="{name: 'archive'}" class="pure-menu-link text-uppercase">Archivo</router-link></li>
      <li class="pure-item-menu"><router-link :to="{name: 'contact'}" class="pure-menu-link text-uppercase">Contacto</router-link></li>
    </ul>
  </nav>
</template>
