defmodule Biblo.Book do
  @moduledoc """
    Biblo.Book
  """

  use Ecto.Schema

  import Ecto.Changeset
  alias Biblo.Copy
  alias Biblo.Category

  @primary_key {:id, :binary_id, autogenerate: true}
  @required_params [:isbn, :title, :year, :author, :edition, :categories]

  schema "books" do
    field :isbn, :string
    field :title, :string
    field :year, :string
    field :author, :string
    field :edition, :string
    has_many :copies, Copy
    many_to_many :categories, Category, join_through: "books_categories"

    timestamps()
  end

  def changeset(params) do
    %__MODULE__{}
    |> cast(params, @required_params)
    |> validate_required(@required_params)
    |> validate_length(:year, min: 2, max: 4)
    |> unique_constraint([:isbn])
  end
end
