<template id="">
  <paginator :url="'/api/etiquetas/' + this.tag" component-name="posts-list"></paginator>
</template>
<script>
  export default {
    props: ['tag']
  }
</script>
