loadNewAuditedBody = ->
  window.location.href = "/milestones_by_audited_body?audited_body_id=" + @.options[@.selectedIndex].value

$ ->
  $('#audited_body').on 'change', loadNewAuditedBody
