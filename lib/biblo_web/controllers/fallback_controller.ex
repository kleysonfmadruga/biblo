defmodule BibloWeb.FallbackController do
  @moduledoc """
    BibloWeb.FallbackController
  """

  use BibloWeb, :controller

  def call(conn, {:error, result}) do
    conn
    |> put_status(:bad_request)
    |> put_view(BibloWeb.ErrorView)
    |> render("400.json", result: result)
  end
end
