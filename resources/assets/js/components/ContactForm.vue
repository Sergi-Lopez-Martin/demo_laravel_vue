<template lang="html">
  <div class="form-contact">
    <transition name="zoom" mode="out-in">
    <p v-if="sent">Mensaje enviado</p>
    <form v-else @submit.prevent="submit">
      <div class="input-container container-flex space-between">
        <input v-model="form.name" type="text" placeholder="Nombre" class="input-name">
        <input v-model="form.email" type="text" placeholder="Email" class="input-email">
      </div>
      <div class="input-container">
        <input v-model="form.subject" type="text" placeholder="Asunto" class="input-subject">
      </div>
      <div class="input-container">
        <textarea v-model="form.message" cols="30" rows="10" placeholder="Mensaje"></textarea>
      </div>
      <div class="send-message">
        <button class="text-uppercase c-green" :disabled="working">
          <span v-if="working">Enviando...</span>
          <span v-else>Enviar</span>
        </button>
      </div>
    </form>
  </transition>
  </div>
</template>

<script>
export default {
  data(){
    return {
      sent: false,
      working: false,
      form: {
        name: '',
        email: '',
        subject: '',
        message: ''
      }
    }
  },
  methods:{
    submit(){
      this.working = true;
      axios.post('/api/messages', this.form)
        .then(res => {
          this.sent = true;
          this.working = false;
        })
        .catch(err => {
          this.sent = false;
          this.working = false;
        })
    }
  }
}
</script>

<style lang="css">
</style>
