<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          <span>
            Sobs
          </span>

          <a class="action-link" @click="showCreateForm">
            Create New Sob
          </a>
        </div>
      </div>

      <div class="panel-body">
        <!-- Current Clients -->
        <p class="m-b-none" v-if="sobs.length === 0">
          You have not created any sobs.
        </p>

        <table class="table table-borderless m-b-none" v-else>
          <thead>
            <tr>
              <th>Sob ID</th>
              <th>Name</th>
              <th>Description</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="sob in sobs">
              <td>{{ sob.id }}</td>
              <td>{{ sob.name }}</td>
              <td>{{ sob.description }}</td>
              <td><a class="action-link" @click="edit(sob)">Edit</a></td>
              <td><a class="action-link text-danger" @click="destroy(sob)">Delete</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="modal fade" id="modal-create-sob" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title">
              Create sob
            </h4>
          </div>

          <div class="modal-body">
            <div class="alert alert-danger" v-if="create.errors.length > 0">
              <p>
                <strong>Whoops!</strong> Something went wrong!
              </p>

              <ul>
                <li v-for="error in create.errors">{{ error }}</li>
              </ul>
            </div>

            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-md-3 control-label">Name</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" @keyup.enter="store" v-model="create.data.name">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Url</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" @keyup.enter="store" v-model="create.data.url">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Description</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" @keyup.enter="store" v-model="create.data.description">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Level</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" @keyup.enter="store" v-model="create.data.level_id">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Topic</label>

                <div class="col-md-7">
                  <input type="text" class="form-control" @keyup.enter="store" v-model="create.data.topic_id">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Start date</label>

                <div class="col-md-7">
                  <input type="date" class="form-control" @keyup.enter="store" v-model="create.data.expected_start_date">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Completion date</label>

                <div class="col-md-7">
                  <input type="date" class="form-control" @keyup.enter="store" v-model="create.data.expected_completion_date">
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            <button type="button" class="btn btn-primary" @click="store">
              Create
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    /*
     * The component's data.
     */
    data() {
      return {
      sobs: [],
        create: {
          errors: [],
          data: {}
        }
      };
    },

    /**
     * Prepare the component.
     */
    mounted() {
      this.all();
    },

    methods: {
      /**
       * Get all of the sobs.
       */
      all() {
        this.$http.get('/api/sobs')
          .then(({ data }) => {
            this.sobs = data.data;
          });
      },

      /**
       * Create a new sob.
       */
      store() {
        this.$http.post('/api/sobs', this.create.data)
          .then(() => {
            this.all();
            this.create.data = {};
            this.hideCreateForm();
          })
          .catch(({ data }) => {
            if (typeof data === 'object') {
              return this.create.errors = _.flatten(_.toArray(data));
            }

            return this.create.errors = ['Something went wrong. Please try again.'];
          });
      },

      /**
       * Update the sob being edited.
       */
      update() {

      },

      /**
       * Destroy the given sob.
       */
      destroy(sob) {
        this.$http.delete('/api/sobs/' + sob.id)
          .then(() => {
            this.all();
          });
      },

      /**
       * Show the form for creating new sobs.
       */
      showCreateForm() {
        $('#modal-create-sob').modal('show');
      },

      /**
       * Hide the form for creating new sobs.
       */
      hideCreateForm() {
        $('#modal-create-sob').modal('hide');
      }
    }
  }
</script>
