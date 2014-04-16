class ReportViewer
  constructor: ->
    $('.toggler').on 'click', @toggleElement

  toggleElement: ->
    $(@).next('.togglee').slideToggle()

$ ->
  window.report_viewer = new ReportViewer
  $(".sortable-table").tablesorter()
  $(".tooltip-me").tooltip()
  
  