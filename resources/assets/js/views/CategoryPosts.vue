<template id="">
  <paginator :url="'/api/categorias/' + this.category" component-name="posts-list"></paginator>
</template>
<script>
  export default {
    props: ['category']
  }
</script>
