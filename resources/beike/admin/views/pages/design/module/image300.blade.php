<template id="module-editor-image300-template">
  <div class="image-edit-wrapper">
    <div class="module-editor-row">{{ __('admin/builder.text_set_up') }}</div>
    <div class="module-edit-group">
      <div class="module-edit-title">{{ __('admin/builder.text_add_pictures') }}</div>
      <div class="pb-images-selector" v-for="(item, index) in module.images" :key="index">
        <div class="selector-head" @click="itemShow(index)">
          <div class="left">

            <img :src="thumbnail(item.image['{{ locale() }}'], 40, 40)" class="img-responsive">
          </div>

          <div class="right"><i :class="'el-icon-arrow-'+(item.show ? 'up' : 'down')"></i></div>
        </div>
        <div :class="'pb-images-list ' + (item.show ? 'active' : '')">
          <div class="pb-images-top">
            <pb-image-selector v-model="item.image"></pb-image-selector>
            <div class="tag">{{ __('admin/builder.text_suggested_size') }}:
              <span>400 x 200</span>
            </div>
          </div>
          <link-selector v-model="item.link"></link-selector>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
Vue.component('module-editor-image300', {
  template: '#module-editor-image300-template',

  props: ['module'],

  data: function () {
    return {
      //
    }
  },

  watch: {
    module: {
      handler: function (val) {
        this.$emit('on-changed', val);
      },
      deep: true
    }
  },

  created: function () {
    //
  },

  methods: {
    itemShow(index) {
      this.module.images.find((e, key) => {if (index != key) return e.show = false});
      this.module.images[index].show = !this.module.images[index].show;
    },
  }
});
</script>

@push('footer-script')
  <script>
    register = @json($register);

    // 定义模块的配置项
    register.make = {
      style: {
        background_color: ''
      },
      floor: languagesFill(''),
      images: [
        {
          image: languagesFill('https://via.placeholder.com/400x200/eeeeee'),
          show: true,
          link: {
            type: 'product',
            value:''
          }
        },
        {
          image: languagesFill('https://via.placeholder.com/400x200/eeeeee'),
          show: false,
          link: {
            type: 'product',
            value:''
          }
        },
        {
          image: languagesFill('https://via.placeholder.com/400x200/eeeeee'),
          show: false,
          link: {
            type: 'product',
            value:''
          }
        },
      ]
    }

    app.source.modules.push(register)
  </script>
@endpush