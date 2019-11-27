export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
      action: '',
      method: 'GET'
    }
  },

  methods: {
    submit() {
      var form = event.target;
      var submitButton = $(event.target).find(":submit")[0];
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        $(submitButton).attr('disabled', true);
        this.beforeSubmit();
        axios[this.method.toLowerCase()](this.action, this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
          $(submitButton).attr('disabled', false);
          this.handleSuccess(response);
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
          $(submitButton).attr('disabled', false);
          this.handleError(error);
        });
      }
    },
    beforeSubmit() {},
    handleError(error) {},
    handleSuccess() {}
  }
}
