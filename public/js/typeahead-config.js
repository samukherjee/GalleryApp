$(document).ready(function() {
  var engine, remoteHost, template, empty;

  remoteHost = 'http://localhost:8000/autocomplete';
  template = Handlebars.compile($("#result-template").html());
  empty = Handlebars.compile($("#empty-template").html());

  engine = new Bloodhound({
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    remote: {
      url: remoteHost + '?term=%QUERY',
      wildcard: '%QUERY'
    }
  });

  // init Typeahead
  $('#my_search').typeahead({
    minLength: 3,
    highlight: true
  },{
    name: 'tags',
    source: engine,
    display: function(item) {
        return item.name;
    },
    limit: 7,
    templates: {
      suggestion: template,
      empty: empty
    }
  });
});