<template>
    <div v-if="show" class="toast" :class="type">
      {{ message }}
    </div>
</template>
  
<script>
export default {
    props: {
      type: {
        type: String,
        default: 'info'
      },
      message: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        show: false
      };
    },
    mounted() {
      this.show = true;
  
      setTimeout(() => {
        this.show = false;
      }, 3000);
    }
};
</script>
  
<style scoped>
.toast {
    margin-right: 1rem;
    position:relative;
    width : max-content;
    height: max-content;
    padding: 10px;
    border-radius: 4px;
    margin-top: 1rem;
    color: #fff;
    font-size: 16px;
}

.info {
    background-color: #007bff;
}

.success {
    background-color: #28a745;
}

.warning {
    background-color: #ffc107;
}

.error {
    background-color: #dc3545;
}
</style>
