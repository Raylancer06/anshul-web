/**
 * ANUKUL Consultation Booking Client-Side Orchestrator
 * Connects Step 1-4 selection flow to the WordPress Server API
 */

(function() {
  'use strict';

  window.anukulBooking = {
    checkAvailability: function(date, slot, callback) {
      if (!window.anukulBookingData) {
        if (callback) callback(true);
        return;
      }

      var formData = new FormData();
      formData.append('action', 'anukul_check_availability');
      formData.append('nonce', window.anukulBookingData.nonce);
      formData.append('date', date);
      formData.append('slot', slot);

      fetch(window.anukulBookingData.ajax_url, {
        method: 'POST',
        body: formData
      })
      .then(function(res) { return res.json(); })
      .then(function(data) {
        if (callback) callback(data.success && data.data.available);
      })
      .catch(function() {
        if (callback) callback(true);
      });
    },

    submitBooking: function(payload, onSuccess, onError) {
      if (!window.anukulBookingData) {
        // Fallback simulation mode
        if (onSuccess) onSuccess({ reference: 'ANKL-2025-' + Math.floor(1000 + Math.random() * 9000) });
        return;
      }

      var formData = new FormData();
      formData.append('action', 'anukul_book_slot');
      formData.append('nonce', window.anukulBookingData.nonce);
      formData.append('tier', payload.tier || 'complete');
      formData.append('date', payload.date);
      formData.append('slot', payload.slot);
      formData.append('name', payload.name);
      formData.append('email', payload.email);
      formData.append('phone', payload.phone);

      fetch(window.anukulBookingData.ajax_url, {
        method: 'POST',
        body: formData
      })
      .then(function(res) { return res.json(); })
      .then(function(res) {
        if (res.success) {
          if (onSuccess) onSuccess(res.data);
        } else {
          if (onError) onError(res.data ? res.data.message : 'Slot reservation failed.');
        }
      })
      .catch(function(err) {
        if (onError) onError('Network error communicating with sanctuary booking gateway.');
      });
    }
  };
})();
