<style type="text/css">
  .key.object { color: #E57373; }
  .key.namespace { color: #EF9A9A; }
  .key.this { color: #E57373; }
  .key.special { color: #90A4AE; }
  .key.function { color: #1565C0; }
  .key.variable { color: #2196F3; }
  .key.keyword { color: #1565C0; }
  .key.comment { color: #90A4AE; }
  .key.string { color: #009688; }
  .key.bool { color: #8E24AA; }
  .key.typecast { color: #8E24AA; }
</style>

<script>
export default {
  template: '<pre v-html="parsed"></pre>',

  data() {
    return {
      parsed: '',
      replacements: [
        {
          pattern: /((["'])(?:(?=(\\?))\3.)*?\2)/g,
          class: 'string',
        },
        {
          pattern: /((?:([^:]\/\/.+)|\/\*[^\/]*\*\/))/g,
          class: 'comment',
        },
        {
          pattern: /(true|false)/g,
          class: 'bool',
        },
        {
          pattern: /([A-Z][A-Za-z]+)(?=\\)/g,
          class: 'namespace',
        },
        {
          pattern: /([\s\(\\][A-Z][A-Za-z]+)(?=::|\(|\)| extends| implements|;|\n| \$)/g,
          class: 'object',
        },
        {
          pattern: /(\$[a-zA-Z]+)/g,
          class: 'variable',
        },
        {
          pattern: /(\$this)/g,
          class: 'this',
        },
        {
          pattern: /(int|bool|string|array|float)(?=\))/g,
          class: 'typecast',
        },
        {
          pattern: /(:|\{|\}|\(|\)|\[|\]|\\|,|\.|!|\$|;|=>|->)/g,
          class: 'special',
        },
        {
          pattern: /( as| implements| instanceof|\secho|\sif| else| elseif|\swhile|\sfor|\sforeach|\sswitch|\scase|\ntrait|\ninterface|\sreturn|\sclass|\nnamespace| extends|\nuse|\spublic|\sprivate| function|\sprotected|\sfinal|\sabstract|new| @return| @param| @var)(?=\s|<)/g,
          class: 'keyword',
        },
      ],
    };
  },

  mounted() {
    this.parsed = this.$slots.default[0].text;

    this.replacements.forEach((replacement) => {
      this.parsed = this.parsed.replace(replacement.pattern, `<span class="key ${replacement.class}">$1</span>`);
    });
  }
}
</script>
