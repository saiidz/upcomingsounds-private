import React from "react";
import { createRoot } from "react-dom/client";
import RatingDashboard from "../components/rating-dashboard.jsx";

function mountRatingWidgets() {
  document.querySelectorAll(".ucs-rating-widget").forEach((el) => {
    if (el.dataset.mounted) return;

    const submissionId = el.dataset.submissionId;
    const role = el.dataset.role;

    createRoot(el).render(
      <RatingDashboard
        submissionId={Number(submissionId)}
        role={role}
      />
    );

    el.dataset.mounted = "1";
  });
}

document.addEventListener("DOMContentLoaded", mountRatingWidgets);
